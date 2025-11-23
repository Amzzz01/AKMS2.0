@extends('layouts.app')

@section('content')
<style>
    #map {
        height: 600px;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .map-controls {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .map-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn-map-action {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-draw-boundary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-edit-boundary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .btn-delete-boundary {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }

    .btn-save-boundary {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }

    .btn-map-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .boundary-list {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .boundary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 8px;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }

    .boundary-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }

    .boundary-color {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 30px;
        border-radius: 12px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
    }

    .instructions {
        background: #e3f2fd;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #2196f3;
    }

    .instructions h4 {
        margin-top: 0;
        color: #1976d2;
    }

    .instructions ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .instructions li {
        margin-bottom: 8px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="map-header">
                <h2><i class="fas fa-map-marked-alt"></i> Pengurusan Peta Kawasan Kariah</h2>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Instructions -->
            <div class="instructions">
                <h4><i class="fas fa-info-circle"></i> Arahan Penggunaan</h4>
                <ul>
                    <li>Klik <strong>"Lukis Sempadan Baru"</strong> untuk mula melukis kawasan kariah baru pada peta</li>
                    <li>Klik pada peta untuk menambah titik sempadan</li>
                    <li>Klik pada titik pertama untuk menutup poligon</li>
                    <li>Klik <strong>"Simpan Sempadan"</strong> untuk menyimpan kawasan yang dilukis</li>
                    <li>Gunakan <strong>"Edit"</strong> untuk mengubah sempadan sedia ada</li>
                    <li>Gunakan <strong>"Padam"</strong> untuk membuang sempadan</li>
                </ul>
            </div>

            <!-- Map Controls -->
            <div class="map-controls">
                <button id="drawBoundaryBtn" class="btn-map-action btn-draw-boundary">
                    <i class="fas fa-draw-polygon"></i> Lukis Sempadan Baru
                </button>
                <button id="saveBoundaryBtn" class="btn-map-action btn-save-boundary" style="display: none;">
                    <i class="fas fa-save"></i> Simpan Sempadan
                </button>
                <button id="cancelDrawBtn" class="btn-map-action btn-delete-boundary" style="display: none;">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button id="editMosqueBtn" class="btn-map-action btn-edit-boundary">
                    <i class="fas fa-mosque"></i> Ubah Lokasi Masjid
                </button>
            </div>

            <!-- Map Container -->
            <div id="map"></div>

            <!-- Boundary List -->
            <div class="boundary-list">
                <h3><i class="fas fa-list"></i> Senarai Sempadan Kawasan</h3>
                <div id="boundaryListContainer">
                    @foreach($boundaries as $boundary)
                    <div class="boundary-item" data-boundary-id="{{ $boundary->id }}">
                        <div style="display: flex; align-items: center;">
                            <div class="boundary-color" style="background-color: {{ $boundary->color }}"></div>
                            <div>
                                <strong>{{ $boundary->area_name }}</strong>
                                @if($boundary->description)
                                <p style="margin: 0; color: #666; font-size: 14px;">{{ $boundary->description }}</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button class="btn-map-action btn-edit-boundary btn-sm" onclick="editBoundary({{ $boundary->id }})">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn-map-action btn-delete-boundary btn-sm" onclick="deleteBoundary({{ $boundary->id }})">
                                <i class="fas fa-trash"></i> Padam
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Boundary Details Modal -->
<div id="boundaryModal" class="modal">
    <div class="modal-content">
        <h3><i class="fas fa-edit"></i> Maklumat Sempadan</h3>
        <form id="boundaryForm">
            <div class="form-group">
                <label for="areaName">Nama Kawasan:</label>
                <select id="areaName" name="area_name" required>
                    <option value="">Pilih Kawasan</option>
                    <option value="Kampung Luar">Kampung Luar</option>
                    <option value="Kampung Padang Mengkudu">Kampung Padang Mengkudu</option>
                    <option value="Kampung Tengah">Kampung Tengah</option>
                    <option value="Lorong Kenanga">Lorong Kenanga</option>
                    <option value="Lorong Penghulu Lama">Lorong Penghulu Lama</option>
                    <option value="Lorong Tok Imam">Lorong Tok Imam</option>
                    <option value="Taman Bagan Indah">Taman Bagan Indah</option>
                    <option value="Taman Bagan Permai">Taman Bagan Permai</option>
                    <option value="Taman Desa Kiara">Taman Desa Kiara</option>
                    <option value="Taman Seri Bagan">Taman Seri Bagan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="boundaryColor">Warna Sempadan:</label>
                <input type="color" id="boundaryColor" name="color" value="#3498db" required>
            </div>
            <div class="form-group">
                <label for="description">Keterangan (Opsyenal):</label>
                <textarea id="description" name="description" rows="3" placeholder="Masukkan keterangan tambahan..."></textarea>
            </div>
            <div style="display: flex; gap: 10px; justify-content: flex-end;">
                <button type="button" class="btn-map-action btn-delete-boundary" onclick="closeBoundaryModal()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button type="submit" class="btn-map-action btn-save-boundary">
                    <i class="fas fa-check"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

<script>
    // Initialize the map
    const mosqueLat = {{ $mosque->latitude ?? 1.4556 }};
    const mosqueLng = {{ $mosque->longitude ?? 103.7645 }};
    const zoomLevel = {{ $mosque->zoom_level ?? 15 }};

    const map = L.map('map').setView([mosqueLat, mosqueLng], zoomLevel);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);

    // Add mosque marker
    const mosqueIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    const mosqueMarker = L.marker([mosqueLat, mosqueLng], { 
        icon: mosqueIcon,
        draggable: false 
    }).addTo(map);
    mosqueMarker.bindPopup('<b>Masjid Al-Irsyad</b><br>Telok Bagan').openPopup();

    // Feature group for drawn items
    const drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    // Load existing boundaries
    const boundaries = @json($boundaries);
    const boundaryLayers = {};

    boundaries.forEach(boundary => {
        const polygon = JSON.parse(boundary.boundary_polygon);
        const layer = L.geoJSON(polygon, {
            style: {
                color: boundary.color,
                fillColor: boundary.color,
                fillOpacity: 0.3,
                weight: 2
            }
        }).addTo(drawnItems);
        
        layer.bindPopup(`<b>${boundary.area_name}</b>`);
        boundaryLayers[boundary.id] = layer;
    });

    // Drawing control
    let drawControl;
    let currentDrawnLayer = null;

    document.getElementById('drawBoundaryBtn').addEventListener('click', function() {
        if (drawControl) {
            map.removeControl(drawControl);
        }

        drawControl = new L.Control.Draw({
            draw: {
                polygon: {
                    allowIntersection: false,
                    showArea: true,
                    drawError: {
                        color: '#e74c3c',
                        message: '<strong>Error:</strong> Sempadan tidak boleh bersilang!'
                    },
                    shapeOptions: {
                        color: '#3498db',
                        fillOpacity: 0.3
                    }
                },
                polyline: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems,
                remove: false
            }
        });

        map.addControl(drawControl);
        
        // Start drawing automatically
        new L.Draw.Polygon(map, drawControl.options.draw.polygon).enable();
        
        document.getElementById('saveBoundaryBtn').style.display = 'inline-block';
        document.getElementById('cancelDrawBtn').style.display = 'inline-block';
        this.style.display = 'none';
    });

    // Handle polygon creation
    map.on('draw:created', function(e) {
        currentDrawnLayer = e.layer;
        drawnItems.addLayer(currentDrawnLayer);
        
        // Show modal to get boundary details
        document.getElementById('boundaryModal').style.display = 'block';
    });

    // Save boundary
    document.getElementById('saveBoundaryBtn').addEventListener('click', function() {
        if (currentDrawnLayer) {
            document.getElementById('boundaryModal').style.display = 'block';
        } else {
            alert('Sila lukis sempadan terlebih dahulu!');
        }
    });

    // Cancel drawing
    document.getElementById('cancelDrawBtn').addEventListener('click', function() {
        if (currentDrawnLayer) {
            drawnItems.removeLayer(currentDrawnLayer);
            currentDrawnLayer = null;
        }
        
        if (drawControl) {
            map.removeControl(drawControl);
            drawControl = null;
        }
        
        document.getElementById('drawBoundaryBtn').style.display = 'inline-block';
        document.getElementById('saveBoundaryBtn').style.display = 'none';
        this.style.display = 'none';
    });

    // Handle form submission
    document.getElementById('boundaryForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!currentDrawnLayer) {
            alert('Tiada sempadan untuk disimpan!');
            return;
        }

        const geoJSON = currentDrawnLayer.toGeoJSON();
        const formData = new FormData(this);
        
        const data = {
            area_name: formData.get('area_name'),
            color: formData.get('color'),
            description: formData.get('description'),
            boundary_polygon: JSON.stringify(geoJSON.geometry)
        };

        try {
            const response = await fetch('{{ route("admin.kariah-map.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            
            if (result.success) {
                alert('Sempadan berjaya disimpan!');
                location.reload();
            } else {
                alert('Gagal menyimpan sempadan!');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Ralat berlaku semasa menyimpan!');
        }
    });

    function closeBoundaryModal() {
        document.getElementById('boundaryModal').style.display = 'none';
    }

    async function deleteBoundary(id) {
        if (!confirm('Adakah anda pasti ingin memadam sempadan ini?')) {
            return;
        }

        try {
            const response = await fetch(`/admin/kariah-map/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            const result = await response.json();
            
            if (result.success) {
                alert('Sempadan berjaya dipadam!');
                location.reload();
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Ralat berlaku semasa memadam!');
        }
    }

    function editBoundary(id) {
        // Implementation for editing existing boundaries
        alert('Fungsi edit akan dilaksanakan');
    }

    // Edit mosque location
    document.getElementById('editMosqueBtn').addEventListener('click', function() {
        if (!mosqueMarker.dragging.enabled()) {
            mosqueMarker.dragging.enable();
            this.innerHTML = '<i class="fas fa-check"></i> Simpan Lokasi Masjid';
            this.style.background = 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)';
            alert('Seret penanda masjid ke lokasi baru, kemudian klik Simpan');
        } else {
            // Save new location
            const newLatLng = mosqueMarker.getLatLng();
            saveMosqueLocation(newLatLng.lat, newLatLng.lng);
        }
    });

    async function saveMosqueLocation(lat, lng) {
        try {
            const response = await fetch('{{ route("admin.kariah-map.update-mosque") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    latitude: lat,
                    longitude: lng,
                    zoom_level: map.getZoom()
                })
            });

            const result = await response.json();
            
            if (result.success) {
                alert('Lokasi masjid berjaya dikemaskini!');
                mosqueMarker.dragging.disable();
                document.getElementById('editMosqueBtn').innerHTML = '<i class="fas fa-mosque"></i> Ubah Lokasi Masjid';
                document.getElementById('editMosqueBtn').style.background = 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)';
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Ralat berlaku semasa menyimpan lokasi!');
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('boundaryModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
@endsection