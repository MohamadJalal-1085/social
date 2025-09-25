@extends('layout')

@section('content')

<div class="main-content">
    <main class="feed-container">
        <div class="feed-controls">
            <div class="feed-tabs">
                <button class="feed-tab active" onclick="switchFeed('following')">Following <span id="following-count">(3)</span></button>
                <button class="feed-tab" onclick="switchFeed('discover')">Discover <span id="discover-count">(2)</span></button>
            </div>
            
            <div class="sort-controls">
                <select class="sort-select" onchange="sortPosts(this.value)">
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                    <option value="most-liked">Most Liked</option>
                    <option value="least-liked">Least Liked</option>
                    <option value="most-commented">Most Commented</option>
                </select>
                
                <button class="refresh-btn" onclick="refreshPosts()">
                    <svg class="refresh-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Refresh
                </button>
            </div>
        </div>

        <div id="posts-container">
            </div>
    </main>
</div>

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
    </div>

@endsection