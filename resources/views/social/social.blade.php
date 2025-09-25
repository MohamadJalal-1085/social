@extends('layouts.base')

@section('main_content')
    @php
        // Mock categories for sidebar
        $categories = [
            ['id' => 1, 'name' => 'Home', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>', 'route' => 'feed'],
            ['id' => 2, 'name' => 'Marketplace', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M8 11v6a2 2 0 002 2h4a2 2 0 002-2v-6M8 11h8"/>', 'route' => 'products.index'],
            ['id' => 3, 'name' => 'Add Post', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>', 'route' => 'posts.create'],
            ['id' => 4, 'name' => 'Add Product', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>', 'route' => 'products.create'],
            ['id' => 5, 'name' => 'Profile', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>', 'route' => 'profile'],
            ['id' => 6, 'name' => 'Settings', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>', 'route' => 'settings'],
        ];

        // Mock suggestions for right sidebar
        $suggestions = [
            [
                'name' => 'Jessica Miller',
                'username' => '@jessica_m',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=40&h=40&fit=crop&crop=face',
            ],
            [
                'name' => 'David Wilson',
                'username' => '@david_w',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=40&h=40&fit=crop&crop=face',
            ],
            [
                'name' => 'Lisa Brown',
                'username' => '@lisa_b',
                'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face',
            ],
            [
                'name' => 'Mike Garcia',
                'username' => '@mike_g',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face',
            ],
            [
                'name' => 'Emma Lee',
                'username' => '@emma_l',
                'avatar' => 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=40&h=40&fit=crop&crop=face',
            ],
        ];

        // Mock posts for feed
        $posts = [
            [
                'id' => 1,
                'author' => [
                    'name' => 'Sarah Johnson',
                    'username' => '@sarah_j',
                    'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=48&h=48&fit=crop&crop=face',
                ],
                'content' => 'Just launched my new handmade jewelry collection! Each piece is crafted with love and attention to detail. Perfect for gifting or treating yourself! ✨',
                'image' => 'https://images.squarespace-cdn.com/content/v1/5f9586dce522ff4870b75308/1632240821141-RZJOKIR8BJOJV8MSDCAK/Fall-jewelry-collection.png',
                'timestamp' => '2h',
                'likes' => 24,
                'dislikes' => 2,
                'comments' => 8,
                'shares' => 3,
                'isMarketplace' => true,
                'price' => 45.00,
                'originalPrice' => 60.00,
                'isFollowing' => true,
            ],
            [
                'id' => 2,
                'author' => [
                    'name' => 'Tech Store Pro',
                    'username' => '@techstore',
                    'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=48&h=48&fit=crop&crop=face',
                ],
                'content' => 'Premium wireless headphones with noise cancellation now available! Experience crystal-clear audio quality and all-day comfort.',
                'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/MQTP3?wid=1144&hei=1144&fmt=jpeg&qlt=90&.v=SUFReFd6NEVVOW50TTcxUzVyWlhHZ2tuVHYzMERCZURia3c5SzJFOTlPZ3oveDdpQVpwS0ltY2w2UW05aU90TzVtaW9peGdOaitwV1Nxb1VublZoTVE',
                'timestamp' => '4h',
                'likes' => 156,
                'dislikes' => 8,
                'comments' => 23,
                'shares' => 12,
                'isMarketplace' => true,
                'price' => 199.99,
                'originalPrice' => 299.99,
                'isFollowing' => false,
            ],
            [
                'id' => 3,
                'author' => [
                    'name' => 'Alex Chen',
                    'username' => '@alexc',
                    'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=48&h=48&fit=crop&crop=face',
                ],
                'content' => 'Beautiful sunset from my evening walk today. Sometimes you just need to slow down and appreciate the simple moments in life. Hope everyone is having a great day! 🌅',
                'image' => 'https://images.unsplash.com/photo-1624365700883-cc574778eff5?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3Vuc2V0JTIwYmVhY2h8ZW58MHx8MHx8fDA%3D',
                'timestamp' => '6h',
                'likes' => 89,
                'dislikes' => 3,
                'comments' => 15,
                'shares' => 7,
                'isMarketplace' => false,
                'isFollowing' => true,
            ],
            [
                'id' => 4,
                'author' => [
                    'name' => 'Maria Rodriguez',
                    'username' => '@maria_r',
                    'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=48&h=48&fit=crop&crop=face',
                ],
                'content' => 'Excited to share my latest photography project! Been working on this series for months. Art has the power to connect us all.',
                'timestamp' => '8h',
                'likes' => 67,
                'dislikes' => 1,
                'comments' => 12,
                'shares' => 5,
                'isMarketplace' => false,
                'isFollowing' => true,
            ],
            [
                'id' => 5,
                'author' => [
                    'name' => 'Green Thumb Gardens',
                    'username' => '@greenthumb',
                    'avatar' => 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=48&h=48&fit=crop&crop=face',
                ],
                'content' => 'Fresh organic vegetables straight from our garden! Perfect for healthy meals and supporting local agriculture. Available for pickup this weekend.',
                'image' => 'https://i0.wp.com/www.gardening4joy.com/wp-content/uploads/2021/06/organic-gardening-main-veg.jpg?resize=1080%2C700&ssl=1',
                'timestamp' => '12h',
                'likes' => 43,
                'dislikes' => 0,
                'comments' => 9,
                'shares' => 6,
                'isMarketplace' => true,
                'price' => 25.00,
                'isFollowing' => false,
            ],
        ];
    @endphp

    <!-- Header -->
    <div class="header d-flex align-items-center justify-content-between mb-4">
        <h1 class="title" style="font-size: clamp(22px, 3.4vw, 32px); margin: 0; color: var(--text, #e6edf3);">Feed</h1>
        <div class="actions d-flex gap-3 align-items-center">
            <a href="{{ url('/products') }}" class="btn btn-primary" style="background: linear-gradient(180deg, var(--primary, #14B8A6), var(--primary-600, #0D9488)); color: #051d1a; border-color: transparent;">
                <i class="bi bi-arrow-left"></i> Marketplace
            </a>
            <a href="/posts/create" class="btn btn-primary" style="background: linear-gradient(180deg, var(--primary, #14B8A6), var(--primary-600, #0D9488)); color: #051d1a; border-color: transparent;">
                <i class="bi bi-plus"></i> Add Post
            </a>
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" alt="Profile" class="rounded-circle" style="width: 32px; height: 32px; border: 1px solid var(--border, rgba(255,255,255,.1));">
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4" style="background: color-mix(in srgb, var(--card, #0f1720) 92%, black 8%); border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: var(--radius, 16px); box-shadow: var(--shadow, 0 12px 30px rgba(0,0,0,.35)); transition: none;">
        <div class="card-body p-3">
            <form class="form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; align-items: end;">
                <div>
                    <x-input-label for="search" :value="('Search')" style="color: #cfe6dd; font-size: 13px;" />
                    <div class="field" style="background: #0b131c; border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: 12px; display: flex; align-items: center; gap: 10px; padding: 10px 12px; transition: border-color .2s, box-shadow .2s, background .2s;">
                        <x-text-input type="text" id="search" placeholder="Search posts..." class="w-100" style="background: #0b131c; border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: 12px; color: var(--text, #e6edf3); font: 14px/1.2 var(--font, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif); min-width: 0; padding: 10px 12px; outline: 0; transition: border-color 0.2s, box-shadow 0.2s; box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.2) inset; -webkit-text-fill-color: var(--text, #e6edf3); -webkit-background-clip: text;" />
                    </div>
                </div>
                <div>
                    <x-input-label for="category" :value="('Category')" style="color: #cfe6dd; font-size: 13px;" />
                    <div class="field" style="background: #0b131c; border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: 12px; display: flex; align-items: center; gap: 10px; padding: 10px 12px; transition: border-color .2s, box-shadow .2s, background .2s;">
                        <select id="category" class="form-select" style="background: #0b131c; border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: 12px; color: var(--text, #e6edf3); font: 14px/1.2 var(--font, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif); min-width: 0; flex: 1; appearance: none; -webkit-appearance: none; -moz-appearance: none; padding: 10px 12px; outline: 0; transition: border-color 0.2s, box-shadow 0.2s; box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.2) inset;">
                            <option value="all" style="background: #0b131c; color: var(--text, #e6edf3);">All Categories</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat['id'] }}" style="background: #0b131c; color: var(--text, #e6edf3);">{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <x-input-label for="sort" :value="('Sort')" style="color: #cfe6dd; font-size: 13px;" />
                    <div class="field" style="background: #0b131c; border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: 12px; display: flex; align-items: center; gap: 10px; padding: 10px 12px; transition: border-color .2s, box-shadow .2s, background .2s;">
                        <select id="sort" class="form-select" style="background: #0b131c; border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: 12px; color: var(--text, #e6edf3); font: 14px/1.2 var(--font, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif); min-width: 0; flex: 1; appearance: none; -webkit-appearance: none; -moz-appearance: none; padding: 10px 12px; outline: 0; transition: border-color 0.2s, box-shadow 0.2s; box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.2) inset;">
                            <option value="newest" style="background: #0b131c; color: var(--text, #e6edf3);">Newest First</option>
                            <option value="price_low" style="background: #0b131c; color: var(--text, #e6edf3);">Price: Low to High</option>
                            <option value="price_high" style="background: #0b131c; color: var(--text, #e6edf3);">Price: High to Low</option>
                            <option value="popular" style="background: #0b131c; color: var(--text, #e6edf3);">Most Popular</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
        @foreach ($posts as $post)
            <div class="card" style="width: 280px; height: 420px; background: color-mix(in srgb, var(--card, #0f1720) 92%, black 8%); border: 1px solid var(--border, rgba(255,255,255,.1)); border-radius: var(--radius, 16px); box-shadow: var(--shadow, 0 12px 30px rgba(0,0,0,.35)); overflow: hidden; display: flex; flex-direction: column; transition: box-shadow 0.3s ease, transform 0.3s ease;">
                @if (isset($post['image']))
                    <img src="{{ $post['image'] }}" alt="{{ $post['content'] }}" style="width: 100%; height: 192px; object-fit: cover; border-bottom: 1px solid var(--border, rgba(255,255,255,.1));">
                @endif
                <div class="card-body" style="padding: 22px 26px 16px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 class="title card-title" style="font-size: clamp(16px, 2.0vw, 18px); margin-bottom: 8px; color: var(--text, #e6edf3); font-weight: 600; line-height: 1.35; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $post['author']['name'] }}</h3>
                        <p class="subtitle card-text text-muted" style="margin-bottom: 12px; color: var(--muted, #a2b3c5); font-size: 13px; line-height: 1.45;">{{ $post['author']['username'] }} • {{ $post['timestamp'] }}</p>
                        <p class="product-description card-text" style="margin: 0; color: var(--text, #e6edf3); overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-height: 72px;">{{ $post['content'] }}</p>
                    </div>
                    <div class="actions d-flex justify-content-between align-items-center" style="margin-top: 16px; padding-top: 10px; border-top: 1px solid var(--border, rgba(255,255,255,.1)); padding-bottom: 15px;">
                        @if ($post['isMarketplace'])
                            <span class="product-price" style="font-size: 18px; font-weight: 600; color: var(--text, #e6edf3);">${{ number_format($post['price'], 2) }}</span>
                        @endif
                        <a href="/posts/{{ $post['id'] }}" class="btn btn-primary" style="background: linear-gradient(180deg, var(--primary, #14B8A6), var(--primary-600, #0D9488)); color: #051d1a; border-color: transparent; padding: 8px 16px; display: inline-flex; align-items: center; gap: 10px; transition: box-shadow 0.3s ease, transform 0.3s ease;">
                            <i class="bi bi-eye"></i> View
                        </a>
                    </div>
                    <div style="height: 10px; background: transparent;"></div> <!-- Spacer or line placeholder -->
                </div>
            </div>
        @endforeach
    </div>
@endsection