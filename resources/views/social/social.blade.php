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

        <div id="posts-container" class="posts-container">
            </div>
    </main>
</div>

@endsection