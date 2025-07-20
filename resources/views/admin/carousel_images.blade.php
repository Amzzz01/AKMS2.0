@extends('layouts.admin')

@section('title', 'Event Management')
@section('page-title', 'Event Management')

@section('additional-css')
<style>
    /* Page Header */
    .page-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 1rem;
        margin: 0;
    }

    /* Stats Cards */
    .carousel-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .carousel-stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .carousel-stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .carousel-stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: white;
    }

    .carousel-stat-card:nth-child(1) .carousel-stat-icon {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .carousel-stat-card:nth-child(2) .carousel-stat-icon {
        background: linear-gradient(135deg, #2196F3, #1976D2);
    }

    .carousel-stat-card:nth-child(3) .carousel-stat-icon {
        background: linear-gradient(135deg, #FF9800, #F57C00);
    }

    .carousel-stat-card:nth-child(4) .carousel-stat-icon {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
    }

    .carousel-stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.3rem;
    }

    .carousel-stat-label {
        color: #64748b;
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* Action Bar */
    .action-bar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        flex-wrap: wrap;
        gap: 1rem;
    }

    .filter-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex: 1;
        min-width: 250px;
    }

    .filter-select {
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: white;
        min-width: 150px;
    }

    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .add-image-btn {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        text-decoration: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
    }

    .add-image-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        color: white;
    }

    /* Images Grid */
    .images-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .images-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .images-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .images-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .image-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
    }

    .image-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .image-preview {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    }

    .image-info {
        padding: 1.5rem;
    }

    .image-filename {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        word-break: break-all;
    }

    .image-type {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        text-transform: capitalize;
    }

    .image-date {
        color: #64748b;
        font-size: 0.8rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .image-actions {
        display: flex;
        gap: 0.5rem;
        justify-content: space-between;
    }

    .btn-view {
        background: linear-gradient(135deg, #2196F3, #1976D2);
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        flex: 1;
        justify-content: center;
    }

    .btn-view:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(33, 150, 243, 0.3);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #f44336, #d32f2f);
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        flex: 1;
        justify-content: center;
    }

    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(244, 67, 54, 0.3);
        color: white;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 2000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .modal-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .modal-subtitle {
        color: #64748b;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .file-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px dashed #e2e8f0;
        border-radius: 12px;
        background: #f8fafc;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
    }

    .modal-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-modal-primary {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-modal-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
    }

    .btn-modal-secondary {
        background: rgba(108, 117, 125, 0.1);
        color: #6c757d;
        border: 2px solid #e2e8f0;
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-modal-secondary:hover {
        background: rgba(108, 117, 125, 0.2);
        border-color: #6c757d;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #64748b;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #e2e8f0;
    }

    .empty-state h3 {
        margin-bottom: 0.5rem;
        color: #2c3e50;
    }

    /* Loading State */
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .carousel-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-container {
            min-width: auto;
        }

        .images-grid {
            grid-template-columns: 1fr;
        }

        .page-title {
            font-size: 1.5rem;
            flex-direction: column;
            gap: 0.5rem;
        }

        .modal-content {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .carousel-stats {
            grid-template-columns: 1fr;
        }

        .modal-actions {
            flex-direction: column;
        }
    }

    /* Animation */
    .animate-in {
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Image zoom on hover */
    .image-preview {
        transition: transform 0.3s ease;
    }

    .image-card:hover .image-preview {
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header animate-in">
        <h1 class="page-title">
            <i class="fas fa-images"></i>
            Event Management
        </h1>
        <p class="page-subtitle">Manage carousel images and event media for your mosque</p>
    </div>

    <!-- Statistics -->
    <div class="carousel-stats animate-in">
        <div class="carousel-stat-card">
            <div class="carousel-stat-icon">
                <i class="fas fa-mosque"></i>
            </div>
            <div class="carousel-stat-number">{{ $images->where('carousel_type', 'program')->count() }}</div>
            <div class="carousel-stat-label">Program Masjid</div>
        </div>
        <div class="carousel-stat-card">
            <div class="carousel-stat-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="carousel-stat-number">{{ $images->where('carousel_type', 'kuliah')->count() }}</div>
            <div class="carousel-stat-label">Kuliah Maghrib</div>
        </div>
        <div class="carousel-stat-card">
            <div class="carousel-stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="carousel-stat-number">{{ $images->where('carousel_type', 'jadual')->count() }}</div>
            <div class="carousel-stat-label">Jadual Kuliah</div>
        </div>
        <div class="carousel-stat-card">
            <div class="carousel-stat-icon">
                <i class="fas fa-images"></i>
            </div>
            <div class="carousel-stat-number">{{ $images->count() }}</div>
            <div class="carousel-stat-label">Total Images</div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="action-bar animate-in">
        <div class="filter-container">
            <label for="typeFilter" style="font-weight: 500; color: #64748b;">Filter by type:</label>
            <select id="typeFilter" class="filter-select">
                <option value="all">All Types</option>
                <option value="program">Program Masjid</option>
                <option value="kuliah">Kuliah Maghrib</option>
                <option value="jadual">Jadual Kuliah</option>
            </select>
        </div>
        <button class="add-image-btn" onclick="showCreateImageModal()">
            <i class="fas fa-plus"></i>
            <span>Add Carousel Image</span>
        </button>
    </div>

    <!-- Images Grid -->
    <div class="images-container animate-in">
        <div class="images-header">
            <h3 class="images-title">
                <i class="fas fa-photo-video"></i>
                Carousel Images
            </h3>
            <div style="color: #64748b; font-size: 0.9rem;">
                <span id="imageCount">{{ $images->count() }}</span> {{ Str::plural('image', $images->count()) }} found
            </div>
        </div>

        @if($images->count() > 0)
            <div class="images-grid" id="imagesGrid">
                @foreach($images as $image)
                    <div class="image-card" data-type="{{ $image->carousel_type }}">
                        <img src="{{ asset('storage/'.$image->file_path) }}" alt="Carousel Image" class="image-preview" loading="lazy">
                        <div class="image-info">
                            <div class="image-filename">{{ basename($image->file_path) }}</div>
                            <span class="image-type">{{ ucfirst($image->carousel_type) }}</span>
                            <div class="image-date">
                                <i class="fas fa-clock"></i>
                                {{ $image->created_at ? $image->created_at->format('d M Y, H:i') : 'N/A' }}
                            </div>
                            <div class="image-actions">
                                <a href="{{ asset('storage/'.$image->file_path) }}" target="_blank" class="btn-view">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.delete.image', $image->id) }}" class="btn-delete" onclick="return confirm('Are you sure you want to delete this image?')">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-images"></i>
                <h3>No Images Found</h3>
                <p>Start by adding your first carousel image for the mosque events.</p>
                <button class="add-image-btn" onclick="showCreateImageModal()" style="margin-top: 1rem;">
                    <i class="fas fa-plus"></i>
                    <span>Add First Image</span>
                </button>
            </div>
        @endif
    </div>
</div>

<!-- Create Image Modal -->
<div id="createImageModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-plus-circle"></i>
                Add New Carousel Image
            </h2>
            <p class="modal-subtitle">Upload a new image for your mosque events</p>
        </div>
        
        <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data" id="imageUploadForm">
            @csrf
            <div class="form-group">
                <label for="carousel" class="form-label">
                    <i class="fas fa-list"></i>
                    Select Carousel Type
                </label>
                <select name="carousel" id="carousel" class="form-control" required>
                    <option value="">Choose carousel type...</option>
                    <option value="program">Program Masjid</option>
                    <option value="kuliah">Kuliah Maghrib</option>
                    <option value="jadual">Jadual Kuliah</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="image" class="form-label">
                    <i class="fas fa-upload"></i>
                    Choose Image File
                </label>
                <div class="file-input-wrapper">
                    <input type="file" name="image" id="image" accept="image/*" required class="form-control" onchange="previewImage(this)">
                </div>
                <div style="margin-top: 0.5rem; font-size: 0.8rem; color: #64748b;">
                    Supported formats: JPG, PNG, GIF. Max size: 5MB
                </div>
            </div>

            <!-- Image Preview -->
            <div id="imagePreview" style="display: none; margin-bottom: 1rem;">
                <label class="form-label">Preview:</label>
                <div style="text-align: center; padding: 1rem; background: #f8fafc; border-radius: 12px;">
                    <img id="previewImg" style="max-width: 100%; max-height: 200px; border-radius: 8px;">
                </div>
            </div>

            <div class="modal-actions">
                <button type="submit" class="btn-modal-primary">
                    <i class="fas fa-upload"></i>
                    Upload Image
                </button>
                <button type="button" class="btn-modal-secondary" onclick="closeCreateImageModal()">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('additional-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const typeFilter = document.getElementById('typeFilter');
        const imageCards = document.querySelectorAll('.image-card');
        const imageCount = document.getElementById('imageCount');

        typeFilter.addEventListener('change', function() {
            const selectedType = this.value;
            let visibleCount = 0;

            imageCards.forEach(card => {
                const cardType = card.getAttribute('data-type');
                if (selectedType === 'all' || cardType === selectedType) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            imageCount.textContent = visibleCount;
        });

        // Add animation delays
        const animateElements = document.querySelectorAll('.animate-in');
        animateElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
        });

        // Animate statistics on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numbers = entry.target.querySelectorAll('.carousel-stat-number');
                    numbers.forEach(number => {
                        const target = parseInt(number.textContent);
                        animateNumber(number, 0, target, 1000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsContainer = document.querySelector('.carousel-stats');
        if (statsContainer) {
            observer.observe(statsContainer);
        }

        // Form submission with loading state
        const form = document.getElementById('imageUploadForm');
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.btn-modal-primary');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
            submitBtn.disabled = true;
        });
    });

    // Modal functions
    function showCreateImageModal() {
        document.getElementById('createImageModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeCreateImageModal() {
        document.getElementById('createImageModal').style.display = 'none';
        document.body.style.overflow = 'auto';
        
        // Reset form
        document.getElementById('imageUploadForm').reset();
        document.getElementById('imagePreview').style.display = 'none';
        
        // Reset button
        const submitBtn = document.querySelector('.btn-modal-primary');
        submitBtn.innerHTML = '<i class="fas fa-upload"></i> Upload Image';
        submitBtn.disabled = false;
    }

    // Image preview function
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Number animation function
    function animateNumber(element, start, end, duration) {
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= end) {
                current = end;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 16);
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('createImageModal');
        if (event.target === modal) {
            closeCreateImageModal();
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeCreateImageModal();
        }
    });
</script>
@endsection