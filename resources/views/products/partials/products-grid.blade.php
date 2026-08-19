<style>
.stacked-cards-container {
    position: relative;
    width: 100%;
    max-width: 860px;
    margin: 0 auto;
    padding-bottom: 120px;
}

.stacked-card-item {
    position: sticky;
    top: calc(85px + (var(--card-index) * 12px));
    border-radius: 32px;
    padding: 40px 36px 32px;
    margin-bottom: 60px;
    min-height: 640px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 -10px 35px rgba(0, 0, 0, 0.45), 0 20px 45px rgba(0, 0, 0, 0.4);
    transition: transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.3s ease;
    overflow: hidden;
    color: #ffffff;
    cursor: pointer;
    border: 1px solid rgba(255, 255, 255, 0.15);
}

.stacked-card-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 -14px 40px rgba(0, 0, 0, 0.55), 0 25px 55px rgba(0, 0, 0, 0.5);
}

.stacked-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    font-family: 'Poppins', monospace, sans-serif;
}

.stacked-card-counter {
    font-size: 1.15rem;
    font-weight: 700;
    letter-spacing: 3px;
    opacity: 0.85;
}

.stacked-card-category {
    font-size: 0.9rem;
    font-weight: 700;
    letter-spacing: 3px;
    opacity: 0.85;
    text-transform: uppercase;
}

.stacked-card-title {
    font-size: 3rem;
    font-weight: 900;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1.05;
    margin-bottom: 12px;
    word-break: break-word;
}

.stacked-card-desc {
    font-size: 1.05rem;
    line-height: 1.5;
    opacity: 0.92;
    margin-bottom: 20px;
    color: rgba(255, 255, 255, 0.95);
    max-width: 90%;
}

.stacked-card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 25px;
}

.stacked-tag-badge {
    background: rgba(255, 255, 255, 0.16);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    padding: 6px 18px;
    border-radius: 30px;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.stacked-card-image-box {
    position: relative;
    background: #ffffff;
    border-radius: 24px;
    padding: 24px;
    overflow: hidden;
    flex: 1;
    min-height: 280px;
    max-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.stacked-card-image-box img {
    max-width: 100%;
    max-height: 360px;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 12px;
    transition: transform 0.4s ease;
}

.stacked-card-item:hover .stacked-card-image-box img {
    transform: scale(1.03);
}

.stacked-card-overlay {
    position: absolute;
    bottom: 16px;
    right: 16px;
    z-index: 5;
}

.stacked-view-btn {
    background: #000000;
    color: #ffffff;
    padding: 10px 22px;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: background 0.3s ease, transform 0.2s ease;
}

.stacked-card-item:hover .stacked-view-btn {
    background: #1193d4;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .stacked-cards-container {
        padding-bottom: 60px;
    }
    .stacked-card-item {
        top: calc(70px + (var(--card-index) * 8px));
        padding: 28px 22px 22px;
        border-radius: 24px;
        margin-bottom: 40px;
        min-height: 500px;
    }
    .stacked-card-counter {
        font-size: 1rem;
    }
    .stacked-card-category {
        font-size: 0.8rem;
    }
    .stacked-card-title {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    .stacked-card-desc {
        font-size: 0.9rem;
        margin-bottom: 15px;
        max-width: 100%;
    }
    .stacked-tag-badge {
        padding: 4px 14px;
        font-size: 0.72rem;
    }
    .stacked-card-image-box {
        padding: 16px;
        min-height: 220px;
        max-height: 320px;
        border-radius: 18px;
    }
    .stacked-card-image-box img {
        max-height: 280px;
    }
    .stacked-view-btn {
        padding: 8px 16px;
        font-size: 0.78rem;
    }
}
</style>

@php
    $allProjects = collect();
    foreach ($categories as $category) {
        foreach ($category->products as $product) {
            $allProjects->push([
                'product' => $product,
                'category' => $category
            ]);
        }
    }
    $totalProjects = $allProjects->count();
    
    // Exact colors from reference screenshots
    $bgColors = [
        ['bg' => '#3b3cb4', 'text' => '#ffffff'], // Royal Blue
        ['bg' => '#f26522', 'text' => '#ffffff'], // Vibrant Orange
        ['bg' => '#ef4036', 'text' => '#ffffff'], // Crimson Red
        ['bg' => '#6d5545', 'text' => '#ffffff'], // Earth Brown
        ['bg' => '#007a4d', 'text' => '#ffffff'], // Emerald Green
        ['bg' => '#7b1fa2', 'text' => '#ffffff'], // Purple
        ['bg' => '#0088cc', 'text' => '#ffffff'], // Cyan Blue
    ];
@endphp

<div class="stacked-cards-container">
    @forelse($allProjects as $index => $item)
        @php
            $product = $item['product'];
            $category = $item['category'];
            $color = $bgColors[$index % count($bgColors)];
            $counter = sprintf('%02d / %02d', $index + 1, $totalProjects);
            
            // Extract description & tech tags
            $descText = !empty($product->description) ? trim(strip_tags($product->description)) : '';
            $tags = [];
            if (!empty($descText)) {
                if (str_contains($descText, ',')) {
                    $parts = explode(',', $descText);
                    foreach ($parts as $p) {
                        $p = trim($p);
                        if (!empty($p) && strlen($p) < 25) {
                            $tags[] = strtoupper($p);
                        }
                    }
                }
            }
            if (empty($tags)) {
                $tags = [strtoupper($category->name)];
                $nameWords = explode(' ', strtoupper($product->name));
                foreach ($nameWords as $w) {
                    if (strlen($w) > 2) $tags[] = $w;
                }
                $tags = array_slice(array_unique($tags), 0, 4);
            } else {
                $tags = array_slice($tags, 0, 4);
            }
        @endphp

        <div class="stacked-card-item"
             style="--card-index: {{ $index }}; background-color: {{ $color['bg'] }}; z-index: {{ $index + 1 }};"
             onclick="window.location='{{ route('products.show', $product->slug) }}'">
            
            <!-- Card Header -->
            <div class="stacked-card-header">
                <span class="stacked-card-counter">{{ $counter }}</span>
                <span class="stacked-card-category">{{ strtoupper($category->name) }}</span>
            </div>

            <!-- Card Content Body -->
            <div class="stacked-card-body d-flex flex-column flex-grow-1">
                <h2 class="stacked-card-title">{{ $product->name }}</h2>

                @if(!empty($descText))
                    <p class="stacked-card-desc">{{ Str::limit($descText, 140) }}</p>
                @endif

                <!-- Badges -->
                <div class="stacked-card-tags">
                    @foreach($tags as $tag)
                        <span class="stacked-tag-badge">{{ $tag }}</span>
                    @endforeach
                </div>

                <!-- Preview Image Frame -->
                <div class="stacked-card-image-box">
                    @if($product->cover_image)
                        <img src="{{ asset('upload/' . $product->cover_image) }}" alt="{{ $product->name }}" loading="lazy" />
                    @elseif($product->images->first())
                        <img src="{{ asset('upload/' . $product->images->first()->image) }}" alt="{{ $product->name }}" loading="lazy" />
                    @else
                        <img src="https://via.placeholder.com/600x350?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" />
                    @endif
                    <div class="stacked-card-overlay">
                        <span class="stacked-view-btn">View Details <i class="webexbase-icon-up-right-arrow-1"></i></span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5 text-white" style="padding: 60px 0; color: rgba(255,255,255,0.7);">
            <h4 class="text-white">No projects found in this category.</h4>
        </div>
    @endforelse
</div>
