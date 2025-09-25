<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotFbMarketPlace</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="container">        
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- Right Sidebar -->
        <div class="right-sidebar">
            <div class="right-search-container">
                <div class="search-container">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" class="right-search-input search-input" placeholder="Search posts, products, people...">
                </div>
            </div>
            <div class="suggestions-card">
                <h3 class="suggestions-title">Suggested for you</h3>
                <div class="suggestion-item">
                    <img src="https://placehold.co/40x40?text=JM" alt="Jessica Miller" class="suggestion-avatar">
                    <div class="suggestion-info">
                        <div class="suggestion-name">Jessica Miller</div>
                        <div class="suggestion-username">@jessica_m</div>
                        <div class="followed-by">Followed by friend1, friend2 and 5 others</div>
                    </div>
                    <button class="suggestion-follow-btn" onclick="followSuggestion(this)">Follow</button>
                </div>
                <div class="suggestion-item">
                    <img src="https://placehold.co/40x40?text=DW" alt="David Wilson" class="suggestion-avatar">
                    <div class="suggestion-info">
                        <div class="suggestion-name">David Wilson</div>
                        <div class="suggestion-username">@david_w</div>
                        <div class="followed-by">Followed by friend3, friend4</div>
                    </div>
                    <button class="suggestion-follow-btn" onclick="followSuggestion(this)">Follow</button>
                </div>
                <div class="suggestion-item">
                    <img src="https://placehold.co/40x40?text=LB" alt="Lisa Brown" class="suggestion-avatar">
                    <div class="suggestion-info">
                        <div class="suggestion-name">Lisa Brown</div>
                        <div class="suggestion-username">@lisa_b</div>
                        <div class="followed-by">Followed by friend5, friend6 and 3 others</div>
                    </div>
                    <button class="suggestion-follow-btn" onclick="followSuggestion(this)">Follow</button>
                </div>
                <div class="suggestion-item">
                    <img src="https://placehold.co/40x40?text=MG" alt="Mike Garcia" class="suggestion-avatar">
                    <div class="suggestion-info">
                        <div class="suggestion-name">Mike Garcia</div>
                        <div class="suggestion-username">@mike_g</div>
                        <div class="followed-by">Followed by friend7, friend8</div>
                    </div>
                    <button class="suggestion-follow-btn" onclick="followSuggestion(this)">Follow</button>
                </div>
                <div class="suggestion-item">
                    <img src="https://placehold.co/40x40?text=EL" alt="Emma Lee" class="suggestion-avatar">
                    <div class="suggestion-info">
                        <div class="suggestion-name">Emma Lee</div>
                        <div class="suggestion-username">@emma_l</div>
                        <div class="followed-by">Followed by friend9, friend10 and 2 others</div>
                    </div>
                    <button class="suggestion-follow-btn" onclick="followSuggestion(this)">Follow</button>
                </div>
                <a href="#" class="view-all-link">View all</a>
            </div>
            <div class="ad-card">
                <h3 class="ad-title">Sponsored</h3>
                <a href="#marketplace">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2599&q=80" alt="Sponsored product" class="ad-image">
                </a>
                <div class="ad-text-title">Headphones on Sale</div>
                <div class="ad-subtext">Get 30% off headphones this week only.</div>
                <button class="shop-now-btn">Shop Now</button>
            </div>
            <div class="friends-card">
                <h3 class="friends-title">Friends on Market Now</h3>
                <div class="friend-item">
                    <div class="friend-avatar">AB</div>
                    <div class="friend-info">
                        <div class="friend-name">Alice Brown</div>
                        <div class="friend-username">@alice_b</div>
                        <div class="friend-status">Selling handcrafts • 2 hours ago</div>
                    </div>
                </div>
                <div class="friend-item">
                    <div class="friend-avatar">CD</div>
                    <div class="friend-info">
                        <div class="friend-name">Charlie Davis</div>
                        <div class="friend-username">@charlie_d</div>
                        <div class="friend-status">Selling books • 1 hour ago</div>
                    </div>
                </div>
                <div class="friend-item">
                    <div class="friend-avatar">EF</div>
                    <div class="friend-info">
                        <div class="friend-name">Eve Foster</div>
                        <div class="friend-username">@eve_f</div>
                        <div class="friend-status">Selling electronics • 3 hours ago</div>
                    </div>
                </div>
            </div>
            <div class="trending-card">
                <h3 class="trending-title">
                    Trending Now
                    <span class="trending-badge">Hot</span>
                </h3>
                <ul class="trending-list">
                    <li class="trending-item">
                        <span class="trending-hashtag">#headphones</span>
                        <span class="trending-count">1.4k</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-hashtag">#sofa</span>
                        <span class="trending-count">2.1k</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-hashtag">#laptop</span>
                        <span class="trending-count">3.5k</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-hashtag">#books</span>
                        <span class="trending-count">1.8k</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-hashtag">#fashion</span>
                        <span class="trending-count">4.2k</span>
                    </li>
                </ul>
            </div>
            <div class="sidebar-footer">
                <div class="footer-links">
                    <a href="#" class="footer-link">About</a>
                    <a href="#" class="footer-link">Help</a>
                    <a href="#" class="footer-link">Privacy</a>
                    <a href="#" class="footer-link">Terms</a>
                    <a href="#" class="footer-link">Locations</a>
                    <a href="#" class="footer-link">Language</a>
                    <a href="#" class="footer-link">Mix Verified</a>
                </div>
                <p class="copyright">© 2025 NotFbMarketPlace from Mix</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>