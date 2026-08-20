<style>
.stacked-slider-section {
    position: relative;
    width: 100%;
    max-width: 840px;
    margin: 0 auto;
    padding: 10px 0 30px;
}

.stacked-slider-viewport {
    position: relative;
    width: 100%;
    height: 520px;
    perspective: 1000px;
    touch-action: none;
    user-select: none;
    -webkit-user-select: none;
}

.stacked-slide-card {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 440px;
    border-radius: 28px;
    padding: 28px 30px 22px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
    transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.5s ease, filter 0.5s ease;
    color: #ffffff;
    cursor: pointer;
    border: 1px solid rgba(255, 255, 255, 0.18);
    transform-origin: top center;
    user-select: none;
}

.stacked-slide-card.active {
    box-shadow: 0 16px 45px rgba(0, 0, 0, 0.5);
}

.stacked-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    font-family: 'Poppins', monospace, sans-serif;
}

.stacked-card-counter {
    font-size: 1.05rem;
    font-weight: 700;
    letter-spacing: 2px;
    opacity: 0.85;
}

.stacked-card-category {
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 2px;
    opacity: 0.85;
    text-transform: uppercase;
}

.stacked-card-title {
    font-size: 2.2rem;
    font-weight: 900;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1.05;
    margin-bottom: 8px;
    word-break: break-word;
}

.stacked-card-desc {
    font-size: 0.92rem;
    line-height: 1.4;
    opacity: 0.92;
    margin-bottom: 12px;
    color: rgba(255, 255, 255, 0.95);
    word-break: break-word;
    overflow-wrap: anywhere;
    overflow: hidden;
    max-width: 100%;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.stacked-card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 14px;
    max-width: 100%;
    overflow: hidden;
}

.stacked-tag-badge {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    padding: 4px 14px;
    border-radius: 30px;
    font-size: 0.74rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.stacked-card-image-box {
    position: relative;
    background: #ffffff;
    border-radius: 20px;
    padding: 14px;
    overflow: hidden;
    flex: 1;
    min-height: 170px;
    max-height: 240px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.stacked-card-image-box img {
    max-width: 100%;
    max-height: 210px;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 10px;
    transition: transform 0.4s ease;
}

.stacked-slide-card:hover .stacked-card-image-box img {
    transform: scale(1.03);
}

.stacked-card-overlay {
    position: absolute;
    bottom: 12px;
    right: 12px;
    z-index: 5;
}

.stacked-view-btn {
    background: #000000;
    color: #ffffff;
    padding: 8px 18px;
    border-radius: 30px;
    font-size: 0.78rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 6px;
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
    gap: 16px;
    margin-top: 20px;
}

.stack-ctrl-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    font-size: 1rem;
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
    font-size: 1rem;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 2px;
}

@media (max-width: 768px) {
    .stacked-slider-viewport {
        height: 430px;
    }
    .stacked-slide-card {
        height: 360px;
        padding: 20px 16px 16px;
        border-radius: 20px;
    }
    .stacked-card-title {
        font-size: 1.5rem;
        margin-bottom: 6px;
    }
    .stacked-card-desc {
        font-size: 0.82rem;
        margin-bottom: 8px;
    }
    .stacked-card-image-box {
        padding: 10px;
        min-height: 140px;
        max-height: 180px;
    }
    .stacked-card-image-box img {
        max-height: 160px;
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
                    
                    // Clean & extract description & tech tags
                    $descText = '';
                    if (!empty($product->description)) {
                        $rawDesc = html_entity_decode(strip_tags($product->description), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $rawDesc = str_replace(["\xC2\xA0", '&nbsp;'], ' ', $rawDesc);
                        // Remove raw URLs so long URL strings don't break card layout
                        $cleanDesc = preg_replace('/https?:\/\/[^\s]+/', '', $rawDesc);
                        $cleanDesc = trim(preg_replace('/\s+/', ' ', $cleanDesc));
                        $descText = !empty($cleanDesc) ? $cleanDesc : trim(preg_replace('/\s+/', ' ', $rawDesc));
                    }
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
                    card.style.filter = 'blur(8px)';
                    card.style.pointerEvents = 'none';
                    card.style.zIndex = total - i;
                    card.classList.remove('active');
                } else if (diff === 0) {
                    // Current Active Front Card (Sharp & Focused)
                    card.style.transform = 'translateY(0) scale(1)';
                    card.style.opacity = '1';
                    card.style.filter = 'none';
                    card.style.pointerEvents = 'auto';
                    card.style.zIndex = total + 10;
                    card.classList.add('active');
                } else {
                    // Peeking Cards Below (Slightly blurred focus)
                    const offsetY = Math.min(diff * 35, 105);
                    const scale = Math.max(1 - diff * 0.04, 0.85);
                    const opacity = diff > 4 ? 0 : 1;
                    const blurPx = Math.min(diff * 2.5, 6);
                    
                    card.style.transform = `translateY(${offsetY}px) scale(${scale})`;
                    card.style.opacity = opacity.toString();
                    card.style.filter = `blur(${blurPx}px)`;
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

        // Touch Swipe Handling & Page Scroll Prevention
        let startY = 0;
        let startX = 0;
        let isSwiping = false;

        viewport.addEventListener('touchstart', (e) => {
            startY = e.touches[0].clientY;
            startX = e.touches[0].clientX;
            isSwiping = true;
        }, { passive: true });

        viewport.addEventListener('touchmove', (e) => {
            if (!isSwiping) return;
            const currentY = e.touches[0].clientY;
            const currentX = e.touches[0].clientX;
            const deltaY = currentY - startY;
            const deltaX = currentX - startX;

            // Lock page scrolling while sliding between cards
            if (Math.abs(deltaY) > Math.abs(deltaX)) {
                if ((deltaY < 0 && activeIndex < total - 1) || (deltaY > 0 && activeIndex > 0)) {
                    if (e.cancelable) {
                        e.preventDefault();
                    }
                }
            }
        }, { passive: false });

        viewport.addEventListener('touchend', (e) => {
            if (!isSwiping) return;
            isSwiping = false;
            const endY = e.changedTouches[0].clientY;
            const endX = e.changedTouches[0].clientX;
            const deltaY = endY - startY;
            const deltaX = endX - startX;

            if (Math.abs(deltaY) > Math.abs(deltaX) && Math.abs(deltaY) > 30) {
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

        // Wheel Scroll Handling - Locks page scroll while navigating stack
        let lastWheelTime = 0;
        viewport.addEventListener('wheel', (e) => {
            if ((e.deltaY > 0 && activeIndex < total - 1) || (e.deltaY < 0 && activeIndex > 0)) {
                if (e.cancelable) {
                    e.preventDefault();
                }
                const now = Date.now();
                if (now - lastWheelTime < 350) return;

                if (e.deltaY > 0) {
                    activeIndex++;
                } else {
                    activeIndex--;
                }
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
