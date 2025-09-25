const samplePosts = [
    {
        id: '1',
        author: {
            name: 'Sarah Johnson',
            username: '@sarah_j',
            avatar: 'SJ'
        },
        content: 'Excited to introduce my latest handmade jewelry collection. Each piece is meticulously crafted with premium materials, blending timeless elegance with modern flair. Ideal for special occasions or everyday wear—treat yourself or a loved one today!',
        image: 'https://images.squarespace-cdn.com/content/v1/5f9586dce522ff4870b75308/1632240821141-RZJOKIR8BJOJV8MSDCAK/Fall-jewelry-collection.png',
        timestamp: '2h',
        likes: 24,
        dislikes: 2,
        comments: 8,
        shares: 3,
        isMarketplace: true,
        price: '$45.00',
        originalPrice: '$60.00',
        isFollowing: true,
        feedType: 'following',
        likedBy: ['@friend1', '@friend2']
    },
    {
        id: '2',
        author: {
            name: 'Tech Store Pro',
            username: '@techstore',
            avatar: 'TS'
        },
        content: 'Discover our premium wireless headphones featuring advanced noise cancellation technology. Enjoy immersive sound quality, extended battery life, and ergonomic design for all-day comfort. Perfect for music lovers and professionals alike.',
        image: 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/MQTP3?wid=1144&hei=1144&fmt=jpeg&qlt=90&.v=SUFReFd6NEVVOW50TTcxUzVyWlhHZ2tuVHYzMERCZURia3c5SzJFOTlPZ3oveDdpQVpwS0ltY2w2UW05aU90TzVtaW9peGdOaitwV1Nxb1VublZoTVE',
        timestamp: '4h',
        likes: 156,
        dislikes: 8,
        comments: 23,
        shares: 12,
        isMarketplace: true,
        price: '$199.99',
        originalPrice: '$299.99',
        isFollowing: false,
        feedType: 'discover',
        likedBy: ['@techfan1', '@audiolover']
    },
    {
        id: '3',
        author: {
            name: 'Alex Chen',
            username: '@alexc',
            avatar: 'AC'
        },
        content: 'Captured this stunning sunset during my evening stroll. In our fast-paced world, it\'s moments like these that remind us to pause and appreciate nature\'s beauty. Wishing everyone a peaceful evening filled with simple joys.',
        image: 'https://images.unsplash.com/photo-1624365700883-cc574778eff5?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3Vuc2V0JTIwYmVhY2h8ZW58MHx8MHx8fDA%3D',
        timestamp: '6h',
        likes: 89,
        dislikes: 3,
        comments: 15,
        shares: 7,
        isMarketplace: false,
        isFollowing: true,
        feedType: 'following',
        visibility: 'friends',
        likedBy: ['@naturelover', '@photofan']
    },
    {
        id: '4',
        author: {
            name: 'Maria Rodriguez',
            username: '@maria_r',
            avatar: 'MR'
        },
        content: 'Thrilled to unveil my newest photography series after months of dedicated work. This collection explores themes of connection and creativity, showcasing how art can bridge diverse perspectives and foster meaningful dialogues.',
        image: 'https://images.unsplash.com/photo-1452587925148-ce544e77e70d?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cGhvdG9ncmFwaHl8ZW58MHx8MHx8fDA%3D',
        timestamp: '8h',
        likes: 67,
        dislikes: 1,
        comments: 12,
        shares: 5,
        isMarketplace: false,
        isFollowing: true,
        feedType: 'following',
        likedBy: ['@artenthusiast']
    },
    {
        id: '5',
        author: {
            name: 'Green Thumb Gardens',
            username: '@greenthumb',
            avatar: 'GT'
        },
        content: 'Harvest fresh, organic vegetables directly from our sustainable garden. Support local farming while enjoying nutrient-rich produce for wholesome meals. Available for weekend pickup—come taste the difference in quality and freshness.',
        image: 'https://i0.wp.com/www.gardening4joy.com/wp-content/uploads/2021/06/organic-gardening-main-veg.jpg?resize=1080%2C700&ssl=1',
        timestamp: '12h',
        likes: 43,
        dislikes: 0,
        comments: 9,
        shares: 6,
        isMarketplace: true,
        price: '$25.00',
        isFollowing: false,
        feedType: 'discover',
        likedBy: ['@healthyeater', '@localfarmer']
    }
];

let currentPosts = [...samplePosts];
let postStates = {};
let currentFeed = 'following';
let currentSort = 'newest';

function initializePostStates() {
    currentPosts.forEach(post => {
        if (!postStates[post.id]) {
           postStates[post.id] = {
                isLiked: false,
                isDisliked: false,
                isFollowing: post.isFollowing || false,
                isSaved: false,
                likesCount: post.likes,
                dislikesCount: post.dislikes,
                commentsCount: post.comments,
                sharesCount: post.shares,
                showComments: true,
                showAllComments: false,
                editingCommentId: null,
                menuOpen: false,
                comments: generateRandomComments(post.comments),
                likedBy: post.likedBy || []
            };
        }
    });
}

function generateRandomComments(count) {
    const users = ['Alice', 'Bob', 'Charlie', 'Dana', 'Eve'];
    const contents = [
        'Looks amazing!',
        'Great work!',
        'I love this.',
        'Very interesting.',
        'Thanks for sharing.'
    ];
    const comments = [];
    for (let i = 0; i < count; i++) {
        comments.push({
            id: Date.now().toString() + i,
            author: users[Math.floor(Math.random() * users.length)],
            content: contents[Math.floor(Math.random() * contents.length)],
            timestamp: Math.floor(Math.random() * 60) + 'm'
        });
    }
    return comments;
}

function getFilteredPosts() {
    return currentPosts.filter(post => post.feedType === currentFeed);
}

function sortPosts(sortType) {
    currentSort = sortType;
    const filteredPosts = getFilteredPosts();
    
    filteredPosts.sort((a, b) => {
        const stateA = postStates[a.id];
        const stateB = postStates[b.id];
        
        switch(sortType) {
            case 'newest':
                return new Date(b.timestamp) - new Date(a.timestamp);
            case 'oldest':
                return new Date(a.timestamp) - new Date(b.timestamp);
            case 'most-liked':
                return stateB.likesCount - stateA.likesCount;
            case 'least-liked':
                return stateA.likesCount - stateB.likesCount;
            case 'most-commented':
                return stateB.commentsCount - stateA.commentsCount;
            default:
                return 0;
        }
    });
    
    renderPosts(filteredPosts);
}

function switchFeed(feedType) {
    currentFeed = feedType;
    
    document.querySelectorAll('.feed-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    event.target.classList.add('active');
    
    updateFeedCounts();
    sortPosts(currentSort);
}

function updateFeedCounts() {
    const followingCount = currentPosts.filter(p => p.feedType === 'following').length;
    const discoverCount = currentPosts.filter(p => p.feedType === 'discover').length;
    
    document.getElementById('following-count').textContent = `(${followingCount})`;
    document.getElementById('discover-count').textContent = `(${discoverCount})`;
}


function renderPosts(posts = getFilteredPosts()) {
    const container = document.getElementById('posts-container');
    container.innerHTML = '';

    posts.forEach(post => {
        const state = postStates[post.id];
        const hasImage = !!post.image;
        const displayedComments = state.showAllComments || state.comments.length <= 4 ? state.comments : state.comments.slice(-4);
        const likedByText = state.likesCount > 0 ? `Liked by ${state.likedBy.map(user => `<span class="liked-by-user" data-username="${user}" onclick="goToProfile('${user}')">${user}</span>`).join(', ')}${state.likedBy.length < state.likesCount ? ` and ${state.likesCount - state.likedBy.length} others` : ''}` : '';
        const postElement = document.createElement('div');
        postElement.className = 'post-card';
        postElement.innerHTML = `
            <div class="post-header">
                <div class="post-author">
                    <div class="post-avatar">${post.author.avatar}</div>
                    <div class="author-info">
                        <h3 onclick="goToProfile('${post.author.username}')">${post.author.name}${post.isMarketplace ? '<span class="marketplace-badge"><svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M8 11v6a2 2 0 002 2h4a2 2 0 002-2v-6M8 11h8"/></svg>Marketplace</span>' : ''}</h3>
                        <p class="author-meta">
                            ${post.author.username} • ${post.timestamp}
                        </p>
                    </div>
                </div>
                <div class="post-header-right">
                    <button class="follow-btn ${state.isFollowing ? 'following' : ''}" onclick="toggleFollow('${post.id}')">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${state.isFollowing ? 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z' : 'M12 6v6m0 0v6m0-6h6m-6 0H6'}"/>
                        </svg>
                        ${state.isFollowing ? 'Following' : 'Follow'}
                    </button>
                    
                    <button class="menu-btn" onclick="toggleMenu('${post.id}')">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                    ${state.menuOpen ? `
                        <div class="menu-dropdown">
                            <div class="menu-item danger" onclick="reportUser('${post.id}')">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                                Report User
                            </div>
                            <div class="menu-item" onclick="notInterested('${post.id}')">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"/>
                                </svg>
                                Not interested in content
                            </div>
                            <div class="menu-item" onclick="muteUser('${post.id}')">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                                </svg>
                                Mute User
                            </div>
                            <div class="menu-item danger" onclick="blockUser('${post.id}')">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                                Block User
                            </div>
                        </div>
                    ` : ''}
                </div>
            </div>
            <div class="post-content">
                <div class="post-left-section">
                    ${hasImage ? `
                        <div class="post-image-container">
                            <img src="${post.image}" alt="Post content" class="post-image" onclick="openImageModal('${post.image}')">
                        </div>
                    ` : ''}
                    ${post.isMarketplace && post.price ? `
                        <div class="marketplace-info">
                            <div class="price-info">
                                <span class="price">${post.price}</span>
                                ${post.originalPrice ? `<span class="original-price">${post.originalPrice}</span>` : ''}
                            </div>
                            <button class="view-details-btn" onclick="viewDetails('${post.id}')">View Details</button>
                        </div>
                    ` : ''}
                    <div class="post-text-container">
                        <p class="post-text">${post.content}</p>
                    </div>
                </div>
                <div class="post-right-section">
                    <div class="comments-section">
                        <div class="comments-header">Comments (${state.commentsCount})</div>
                        <div class="comments-list">
                            ${displayedComments.map(comment => `
                                <div class="comment">
                                    <div class="comment-avatar">${comment.author.charAt(0)}</div>
                                    <div class="comment-content">
                                        <div class="comment-bubble">
                                            <p class="comment-author">${comment.author}</p>
                                            ${state.editingCommentId === comment.id ? `
                                                <input type="text" class="edit-input" id="edit-input-${comment.id}" value="${comment.content}">
                                                <div class="edit-actions">
                                                    <button class="save-edit-btn" onclick="saveEdit('${post.id}', '${comment.id}')">Save</button>
                                                    <button class="cancel-edit-btn" onclick="cancelEdit('${post.id}')">Cancel</button>
                                                </div>
                                            ` : `
                                                <p class="comment-text">${comment.content}</p>
                                            `}
                                        </div>
                                        <p class="comment-time">
                                            ${comment.author === 'You' && state.editingCommentId !== comment.id ? `<span><button class="edit-btn" onclick="editComment('${post.id}', '${comment.id}')">Edit</button> • <button class="delete-btn" onclick="deleteComment('${post.id}', '${comment.id}')">Delete</button></span>` : '<span></span>'}
                                            <span>${comment.timestamp === 'edited' ? 'edited' : comment.timestamp}</span>
                                        </p>
                                    </div>
                                </div>
                            `).join('')}
                            ${!state.showAllComments && state.comments.length > 4 ? `
                                <p class="view-all-comments" onclick="showAllComments('${post.id}')">View all ${state.commentsCount} comments</p>
                            ` : ''}
                        </div>
                        <div class="comment-input-section">
                            <input type="text" class="comment-input" placeholder="Write a comment..." id="comment-input-${post.id}" onkeypress="handleCommentKeyPress(event, '${post.id}')">
                            <button class="send-btn" onclick="addComment('${post.id}')">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="action-btn ${state.isLiked ? 'liked' : ''}" onclick="toggleLike('${post.id}')">
                    <svg class="action-icon" fill="${state.isLiked ? 'currentColor' : 'none'}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    ${state.likesCount}
                </button>
                <button class="action-btn ${state.isDisliked ? 'disliked' : ''}" onclick="toggleDislike('${post.id}')">
                    <svg class="action-icon" fill="${state.isDisliked ? 'currentColor' : 'none'}" stroke="currentColor" viewBox="0 0 24 24" transform="rotate(180)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    ${state.dislikesCount}
                </button>
                <button class="action-btn" onclick="focusCommentInput('${post.id}')">
                    <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    ${state.commentsCount}
                </button>
                
                            <button class="action-btn" onclick="sharePost('${post.id}')">
                                <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                ${state.sharesCount}
                            </button>

                <button class="action-btn save-btn ${state.isSaved ? 'saved' : ''}" onclick="toggleSave('${post.id}')">
                    <svg class="action-icon" fill="${state.isSaved ? 'currentColor' : 'none'}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                </button>
            </div>

                ${likedByText ? `<p class="liked-by">${likedByText}</p>` : ''}
            </div>
        `;
        container.appendChild(postElement);
    });
}

function toggleLike(postId) {
    const state = postStates[postId];
    if (state.isDisliked) {
        state.isDisliked = false;
        state.dislikesCount--;
    }
    state.isLiked = !state.isLiked;
    state.likesCount += state.isLiked ? 1 : -1;
    if (state.isLiked && !state.likedBy.includes('@you')) {
        state.likedBy.push('@you');
    } else if (!state.isLiked) {
        state.likedBy = state.likedBy.filter(user => user !== '@you');
    }
    renderPosts();
}

function toggleDislike(postId) {
    const state = postStates[postId];
    if (state.isLiked) {
        state.isLiked = false;
        state.likesCount--;
        state.likedBy = state.likedBy.filter(user => user !== '@you');
    }
    state.isDisliked = !state.isDisliked;
    state.dislikesCount += state.isDisliked ? 1 : -1;
    renderPosts();
}

function toggleFollow(postId) {
    const state = postStates[postId];
    state.isFollowing = !state.isFollowing;
    renderPosts();
}

function toggleSave(postId) {
    const state = postStates[postId];
    state.isSaved = !state.isSaved;
    renderPosts();
}

function toggleMenu(postId) {
    const state = postStates[postId];
    state.menuOpen = !state.menuOpen;
    renderPosts();
}


function reportUser(postId) {
    alert(`Reported user for post ${postId}`);
    toggleMenu(postId);
}

function notInterested(postId) {
    currentPosts = currentPosts.filter(post => post.id !== postId);
    delete postStates[postId];
    updateFeedCounts();
    renderPosts();
}

function muteUser(postId) {
    alert(`Muted user for post ${postId}`);
    toggleMenu(postId);
}

function blockUser(postId) {
    alert(`Blocked user for post ${postId}`);
    notInterested(postId);
}

function addComment(postId) {
    const input = document.getElementById(`comment-input-${postId}`);
    const content = input.value.trim();
    if (content) {
        const state = postStates[postId];
        state.comments.push({
            id: Date.now().toString(),
            author: 'You',
            content: content,
            timestamp: 'just now'
        });
        state.commentsCount++;
        input.value = '';
        renderPosts();
    }
}

function handleCommentKeyPress(event, postId) {
    if (event.key === 'Enter') {
        addComment(postId);
    }
}

function editComment(postId, commentId) {
    const state = postStates[postId];
    state.editingCommentId = commentId;
    renderPosts();
}

function saveEdit(postId, commentId) {
    const state = postStates[postId];
    const input = document.getElementById(`edit-input-${commentId}`);
    const newContent = input.value.trim();
    if (newContent) {
        const comment = state.comments.find(c => c.id === commentId);
        if (comment) {
            comment.content = newContent;
            comment.timestamp = 'edited';
        }
        state.editingCommentId = null;
        renderPosts();
    }
}

function cancelEdit(postId) {
    const state = postStates[postId];
    state.editingCommentId = null;
    renderPosts();
}

function deleteComment(postId, commentId) {
    const state = postStates[postId];
    state.comments = state.comments.filter(c => c.id !== commentId);
    state.commentsCount--;
    renderPosts();
}

function showAllComments(postId) {
    const state = postStates[postId];
    state.showAllComments = true;
    renderPosts();
}

function focusCommentInput(postId) {
    document.getElementById(`comment-input-${postId}`).focus();
}

function sharePost(postId) {
    const state = postStates[postId];
    state.sharesCount++;
    alert(`Post ${postId} shared!`);
    renderPosts();
}

function goToProfile(username) {
    alert(`Navigating to profile: ${username}`);
}

function viewDetails(postId) {
    alert(`Viewing details for post ${postId}`);
}

function openImageModal(imageSrc) {
    const modal = document.createElement('div');
    modal.className = 'image-modal';
    modal.innerHTML = `
        <div class="image-modal-content">
            <img src="${imageSrc}" alt="Full image" class="image-modal-img">
            <button class="image-modal-close" onclick="closeImageModal()">×</button>
        </div>
    `;
    document.body.appendChild(modal);
    modal.querySelector('.image-modal-img').addEventListener('click', function() {
        this.classList.toggle('zoomed');
    });
}

function closeImageModal() {
    const modal = document.querySelector('.image-modal');
    if (modal) {
        modal.remove();
    }
}

function followSuggestion(button) {
    const isFollowing = button.textContent === 'Follow';
    button.textContent = isFollowing ? 'Following' : 'Follow';
    button.classList.toggle('following', isFollowing);
}

function refreshPosts() {
    const refreshBtn = document.querySelector('.refresh-btn');
    const refreshIcon = refreshBtn.querySelector('.refresh-icon');
    refreshIcon.classList.add('spinning');
    setTimeout(() => {
        refreshIcon.classList.remove('spinning');
        alert('Posts refreshed!');
    }, 1000);
}

// Initialize the app
document.addEventListener('DOMContentLoaded', () => {
    initializePostStates();
    updateFeedCounts();
    renderPosts();
});