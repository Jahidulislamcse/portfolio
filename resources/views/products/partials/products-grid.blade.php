<style>
.stacked-slider-section {
    position: relative;
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    padding: 20px 0 40px;
}

.stacked-slider-viewport {
    position: relative;
    width: 100%;
    height: 660px;
    perspective: 1000px;
    touch-action: pan-y;
}

.stacked-slide-card {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 560px;
    border-radius: 32px;
    padding: 36px 36px 28px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.45);
    transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.5s ease;
    color: #ffffff;
    cursor: pointer;
    border: 1px solid rgba(255, 255, 255, 0.18);
    transform-origin: top center;
    user-select: none;
}

.stacked-slide-card.active {
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.55);
}

.stacked-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
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
    font-size: 2.8rem;
    font-weight: 900;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1.05;
    margin-bottom: 10px;
    word-break: break-word;
}

.stacked-card-desc {
    font-size: 1rem;
    line-height: 1.45;
    opacity: 0.92;
    margin-bottom: 16px;
    color: rgba(255, 255, 255, 0.95);
}

.stacked-card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.stacked-tag-badge {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    padding: 5px 16px;
    border-radius: 30px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
}

.stacked-card-image-box {
    position: relative;
    background: #ffffff;
    border-radius: 24px;
    padding: 20px;
    overflow: hidden;
    flex: 1;
    min-height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.stacked-card-image-box img {
    max-width: 100%;
    max-height: 310px;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 12px;
    transition: transform 0.4s ease;
}

.stacked-slide-card:hover .stacked-card-image-box img {
    transform: scale(1.03);
}

.stacked-card-overlay {
    position: absolute;
    bottom: 14px;
    right: 14px;
    z-index: 5;
}

.stacked-view-btn {
    background: #000000;
    color: #ffffff;
    padding: 9px 20px;
    border-radius: 30px;
    font-size: 0.82rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: background 0.3s ease, transform 0.2s ease;
}

.stacked-slide-card:hover .stacked-view-btn {
    background: #1193d4;
    transform: scale(1.05);
}

/* Floating Navigation Controls */
.stacked-slider-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-top: 25px;
}

.stack-ctrl-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.stack-ctrl-btn:hover {
    background: #1193d4;
    border-color: #1193d4;
    transform: scale(1.1);
}

.stack-ctrl-btn:disabled {
    opacity: 0.3;
    cursor: not-allowed;
    transform: none;
}

.stack-pagination-counter {
    font-family: 'Poppins', monospace, sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 2px;
}

@media (max-width: 768px) {
    .stacked-slider-viewport {
        height: 540px;
    }
    .stacked-slide-card {
        height: 460px;
        padding: 24px 20px 20px;
        border-radius: 24px;
    }
    .stacked-card-title {
        font-size: 1.8rem;
    }
    .stacked-card-desc {
        font-size: 0.88rem;
    }
    .stacked-card-image-box {
        padding: 14px;
        min-height: 180px;
    }
    .stacked-card-image-box img {
        max-height: 230px;
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

<div class="stacked-slider-section">
    @if($totalProjects > 0)
        <!-- Viewport container for interactive slide stack -->
        <div class="stacked-slider-viewport" id="stackedSliderViewport">
            @foreach($allProjects as $index => $item)
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

                <div class="stacked-slide-card"
                     data-index="{{ $index }}"
                     data-slug="{{ $product->slug }}"
                     style="background-color: {{ $color['bg'] }};">
                    
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
            @endforeach
        </div>

        <!-- Interactive Controls -->
        <div class="stacked-slider-controls">
            <button class="stack-ctrl-btn" id="stackPrevBtn" title="Previous Slide">
                <i class="fas fa-arrow-up"></i>
            </button>
            <span class="stack-pagination-counter" id="stackCounterEl">01 / {{ sprintf('%02d', $totalProjects) }}</span>
            <button class="stack-ctrl-btn" id="stackNextBtn" title="Next Slide">
                <i class="fas fa-arrow-down"></i>
            </button>
        </div>
    @else
        <div class="text-center py-5 text-white" style="padding: 60px 0; color: rgba(255,255,255,0.7);">
            <h4 class="text-white">No projects found in this category.</h4>
        </div>
    @endif
</div>

<script>
(function() {
    function initStackedSlider() {
        const viewport = document.getElementById('stackedSliderViewport');
        if (!viewport) return;

        const cards = Array.from(viewport.querySelectorAll('.stacked-slide-card'));
        const total = cards.length;
        if (total === 0) return;

        let activeIndex = 0;
        const prevBtn = document.getElementById('stackPrevBtn');
        const nextBtn = document.getElementById('stackNextBtn');
        const counterEl = document.getElementById('stackCounterEl');

        function updateStack() {
            cards.forEach((card, i) => {
                const diff = i - activeIndex;

                if (diff < 0) {
                    // Card has slid UP off the screen
                    card.style.transform = 'translateY(-115%) scale(0.94)';
                    card.style.opacity = '0';
                    card.style.pointerEvents = 'none';
                    card.style.zIndex = total - i;
                    card.classList.remove('active');
                } else if (diff === 0) {
                    // Current Active Front Card
                    card.style.transform = 'translateY(0) scale(1)';
                    card.style.opacity = '1';
                    card.style.pointerEvents = 'auto';
                    card.style.zIndex = total + 10;
                    card.classList.add('active');
                } else {
                    // Peeking Cards Below
                    const offsetY = Math.min(diff * 35, 105);
                    const scale = Math.max(1 - diff * 0.04, 0.85);
                    const opacity = diff > 4 ? 0 : 1;
                    
                    card.style.transform = `translateY(${offsetY}px) scale(${scale})`;
                    card.style.opacity = opacity.toString();
                    card.style.pointerEvents = 'auto';
                    card.style.zIndex = total - i;
                    card.classList.remove('active');
                }
            });

            if (counterEl) {
                counterEl.textContent = `${String(activeIndex + 1).padStart(2, '0')} / ${String(total).padStart(2, '0')}`;
            }

            if (prevBtn) prevBtn.disabled = activeIndex === 0;
            if (nextBtn) nextBtn.disabled = activeIndex === total - 1;
        }

        // Card click handling
        cards.forEach((card, index) => {
            card.addEventListener('click', (e) => {
                if (e.target.closest('.stacked-view-btn') || e.target.closest('a')) {
                    const slug = card.getAttribute('data-slug');
                    if (slug) window.location.href = `/project/${slug}`;
                    return;
                }
                if (index !== activeIndex) {
                    e.preventDefault();
                    e.stopPropagation();
                    activeIndex = index;
                    updateStack();
                } else {
                    const slug = card.getAttribute('data-slug');
                    if (slug) window.location.href = `/project/${slug}`;
                }
            });
        });

        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (activeIndex > 0) {
                    activeIndex--;
                    updateStack();
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (activeIndex < total - 1) {
                    activeIndex++;
                    updateStack();
                }
            });
        }

        // Touch Swipe Handling (Up / Down)
        let startY = 0;
        let startX = 0;
        let isSwiping = false;

        viewport.addEventListener('touchstart', (e) => {
            startY = e.touches[0].clientY;
            startX = e.touches[0].clientX;
            isSwiping = true;
        }, { passive: true });

        viewport.addEventListener('touchend', (e) => {
            if (!isSwiping) return;
            isSwiping = false;
            const endY = e.changedTouches[0].clientY;
            const endX = e.changedTouches[0].clientX;
            const deltaY = endY - startY;
            const deltaX = endX - startX;

            if (Math.abs(deltaY) > Math.abs(deltaX) && Math.abs(deltaY) > 35) {
                if (deltaY < 0 && activeIndex < total - 1) {
                    // Swipe UP -> Next card
                    activeIndex++;
                    updateStack();
                } else if (deltaY > 0 && activeIndex > 0) {
                    // Swipe DOWN -> Previous card
                    activeIndex--;
                    updateStack();
                }
            }
        }, { passive: true });

        // Wheel Scroll Handling inside Viewport
        let lastWheelTime = 0;
        viewport.addEventListener('wheel', (e) => {
            const now = Date.now();
            if (now - lastWheelTime < 400) return;

            if (e.deltaY > 25 && activeIndex < total - 1) {
                e.preventDefault();
                activeIndex++;
                updateStack();
                lastWheelTime = now;
            } else if (e.deltaY < -25 && activeIndex > 0) {
                e.preventDefault();
                activeIndex--;
                updateStack();
                lastWheelTime = now;
            }
        }, { passive: false });

        updateStack();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initStackedSlider);
    } else {
        initStackedSlider();
    }
})();
</script>
