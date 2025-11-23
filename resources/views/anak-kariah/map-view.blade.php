@extends('layouts.app')

@section('content')
<style>
    /* Mobile-first design for map container */
    .map-wrapper {
        width: 100%;
        height: 100%;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
    }

    #kariahMap {
        height: 100%;
        width: 100%;
        min-height: 300px;
    }

    .map-info-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 10px 15px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        max-width: calc(100% - 20px);
    }

    .map-info-overlay h4 {
        margin: 0 0 5px 0;
        font-size: 14px;
        color: #2c3e50;
        font-weight: 600;
    }

    .map-info-overlay p {
        margin: 0;
        font-size: 12px;
        color: #7f8c8d;
    }

    .map-legend {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        max-width: 200px;
        max-height: 150px;
        overflow-y: auto;
    }

    .map-legend h5 {
        margin: 0 0 8px 0;
        font-size: 12px;
        color: #2c3e50;
        font-weight: 600;
    }

    .legend-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        font-size: 11px;
        gap: 8px;
    }

    .legend-color {
        width: 16px;
        height: 16px;
        border-radius: 3px;
        border: 1px solid #333;
        flex-shrink: 0;
    }

    .legend-label {
        color: #555;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Leaflet popup customization */
    .leaflet-popup-content-wrapper {
        border-radius: 8px;
        box-shadow: 0 3px 14px rgba(0, 0, 0, 0.2);
    }

    .leaflet-popup-content {
        margin: 10px;
        font-family: 'Poppins', sans-serif;
    }

    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
        #kariahMap {
            min-height: 250px;
        }

        .map-info-overlay {
            padding: 8px 12px;
        }

        .map-info-overlay h4 {
            font-size: 12px;
        }

        .map-info-overlay p {
            font-size: 10px;
        }

        .map-legend {
            max-width: 150px;
            max-height: 120px;
            padding: 8px;
        }

        .map-legend h5 {
            font-size: 11px;
        }

        .legend-item {
            font-size: 10px;
        }

        .legend-color {
            width: 14px;
            height: 14px;
        }
    }

    @media (max-width: 480px) {
        #kariahMap {
            min-height: 200px;
        }

        .map-info-overlay {
            top: 5px;
            left: 5px;
            padding: 6px 10px;
        }

        .map-legend {
            bottom: 5px;
            right: 5px;
            max-width: 120px;
            padding: 6px;
        }
    }

    /* Hide leaflet attribution on small screens */
    @media (max-width: 480px) {
        .leaflet-control-attribution {
            font-size: 8px;
        }
    }
</style>

<div class="map-wrapper">
    <!-- Info Overlay -->
    <div class="map-info-overlay">
        <h4><i class="fas fa-mosque"></i> Masjid Al-Irsyad</h4>
        <p>Telok Bagan, Johor</p>
    </div>

    <!-- Map Container -->
    <div id="kariahMap"></div>

    <!-- Legend -->
    <div class="map-legend">
        <h5><i class="fas fa-layer-group"></i> Kawasan</h5>
        @if(isset($boundaries) && count($boundaries) > 0)
            @foreach($boundaries as $boundary)
            <div class="legend-item">
                <div class="legend-color" style="background-color: {{ $boundary->color }};"></div>
                <span class="legend-label">{{ $boundary->area_name }}</span>
            </div>
            @endforeach
        @else
            <div class="legend-item">
                <span class="legend-label" style="color: #999;">Tiada data</span>
            </div>
        @endif
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the map
        const mosqueLat = {{ isset($mosque) ? $mosque->latitude : 1.4556 }};
        const mosqueLng = {{ isset($mosque) ? $mosque->longitude : 103.7645 }};
        const zoomLevel = {{ isset($mosque) ? $mosque->zoom_level : 15 }};

        const kariahMap = L.map('kariahMap', {
            zoomControl: true,
            scrollWheelZoom: false, // Disable scroll zoom for better mobile experience
            dragging: true,
            tap: true
        }).setView([mosqueLat, mosqueLng], zoomLevel);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap',
            maxZoom: 19,
            minZoom: 10
        }).addTo(kariahMap);

        // Custom mosque marker icon
        const mosqueIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [30, 46],
            iconAnchor: [15, 46],
            popupAnchor: [1, -40],
            shadowSize: [46, 46]
        });

        // Add mosque marker
        const mosqueMarker = L.marker([mosqueLat, mosqueLng], { 
            icon: mosqueIcon,
            title: 'Masjid Al-Irsyad'
        }).addTo(kariahMap);
        
        mosqueMarker.bindPopup(`
            <div style="text-align: center; padding: 5px;">
                <h3 style="margin: 5px 0; color: #e74c3c; font-size: 16px;">
                    <i class="fas fa-mosque"></i> Masjid Al-Irsyad
                </h3>
                <p style="margin: 5px 0; color: #7f8c8d; font-size: 13px;">Telok Bagan, Johor</p>
            </div>
        `);

        // Load and display boundaries
        @if(isset($boundaries) && count($boundaries) > 0)
        const boundaries = @json($boundaries);
        const allLayers = [];

        boundaries.forEach(boundary => {
            try {
                const polygon = JSON.parse(boundary.boundary_polygon);
                
                const layer = L.geoJSON(polygon, {
                    style: {
                        color: boundary.color,
                        fillColor: boundary.color,
                        fillOpacity: 0.25,
                        weight: 2,
                        opacity: 0.8
                    }
                }).addTo(kariahMap);
                
                allLayers.push(layer);
                
                // Add popup with area information
                let popupContent = `
                    <div style="text-align: center; padding: 5px; min-width: 120px;">
                        <h4 style="margin: 5px 0; color: ${boundary.color}; font-size: 14px;">
                            <i class="fas fa-map-marker-alt"></i> ${boundary.area_name}
                        </h4>
                `;
                
                if (boundary.description) {
                    popupContent += `<p style="margin: 5px 0; color: #7f8c8d; font-size: 11px;">${boundary.description}</p>`;
                }
                
                popupContent += `</div>`;
                
                layer.bindPopup(popupContent);
                
                // Highlight on hover
                layer.on('mouseover', function() {
                    this.setStyle({
                        fillOpacity: 0.5,
                        weight: 3
                    });
                });
                
                layer.on('mouseout', function() {
                    this.setStyle({
                        fillOpacity: 0.25,
                        weight: 2
                    });
                });
            } catch (error) {
                console.error('Error loading boundary:', boundary.area_name, error);
            }
        });

        // Fit map to show all boundaries and mosque
        if (allLayers.length > 0) {
            const group = new L.featureGroup(allLayers);
            group.addLayer(mosqueMarker);
            
            // Fit bounds with padding
            kariahMap.fitBounds(group.getBounds().pad(0.1));
        }
        @else
        // If no boundaries, just center on mosque
        mosqueMarker.openPopup();
        @endif

        // Add scale control
        L.control.scale({
            imperial: false,
            metric: true,
            position: 'bottomleft',
            maxWidth: 100
        }).addTo(kariahMap);

        // Enable scroll zoom on click
        kariahMap.once('focus', function() { 
            kariahMap.scrollWheelZoom.enable(); 
        });

        // Invalidate size after a short delay to ensure proper rendering
        setTimeout(function() {
            kariahMap.invalidateSize();
        }, 100);
    });
</script>