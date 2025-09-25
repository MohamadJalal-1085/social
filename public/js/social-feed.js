let currentFeed = 'following';
let currentSort = 'newest';

const samplePosts = [
    {
        id: 'post1',
        author: { name: 'TechieTom', username: '@tommy_geeks', avatar: 'T' },
        timestamp: '2h',
        content: 'Just deployed a new feature on my side project! Nothing beats the thrill of seeing your code go live. #webdev #coding',
        image: 'https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60',
        stats: { likes: 120, dislikes: 5, comments: 15 },
        feed: 'following'
    },
    {
        id: 'post2',
        author: { name: 'Wanderlust_Jane', username: '@jane_travels', avatar: 'W' },
        timestamp: '5h',
        content: 'Exploring the beautiful streets of Kyoto. The culture and history here are just breathtaking! 🌸 #travel #japan',
        image: 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60',
        stats: { likes: 350, dislikes: 2, comments: 45 },
        feed: 'discover'
    },
    {
        id: 'post3',
        author: { name: 'FitLife_Mike', username: '@mike_gains', avatar: 'F' },
        timestamp: '1d',
        content: 'Crushed my personal best on the deadlift today! Hard work pays off. #fitness #gymlife',
        image: 'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60',
        stats: { likes: 210, dislikes: 10, comments: 25 },
        feed: 'following'
    },
    {
        id: 'post4',
        author: { name: 'FoodieFinds', username: '@gourmet_gal', avatar: 'F' },
        timestamp: '3d',
        content: 'This homemade pasta was an absolute dream. The secret is in the sauce! 🍝 #food #cooking',
        image: 'https://images.unsplash.com/photo-1563379926898-059611e05472?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60',
        stats: { likes: 500, dislikes: 1, comments: 80 },
        feed: 'discover'
    },
    {
        id: 'post5',
        author: { name: 'ArtisticSoul', username: '@creative_casey', avatar: 'A' },
        timestamp: '5d',
        content: 'Finished my latest oil painting. I call it "City at Dusk". What do you guys think? #art #painting',
        image: 'https://images.unsplash.com/photo-1506806732259-39c2d0268443?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60',
        stats: { likes: 420, dislikes: 8, comments: 60 },
        feed: 'following'
    }
];

const postStates = samplePosts.reduce((acc, post) => {
    acc[post.id] = {
        isLiked: false,
        isDisliked: false,
        likesCount: post.stats.likes,
        dislikesCount: post.stats.dislikes,
        comments: []
    };
    return acc;
}, {});

document.addEventListener('DOMContentLoaded', () => {
    renderPosts();
});

function getFilteredPosts() {
    return samplePosts.filter(post => post.feed === currentFeed);
}

function renderPosts(posts = getFilteredPosts()) {
    const container = document.getElementById('posts-container');
    container.innerHTML = '';

    posts.forEach(post => {
        const state = postStates[post.id];
        const postElement = document.createElement('div');
        postElement.className = 'post-card';
        postElement.innerHTML = `
            <div class="post-header">
                <div class="post-author">
                    <div class="post-avatar">${post.author.avatar}</div>
                    <div class="author-info">
                        <h3>${post.author.name}</h3>
                        <p class="author-meta">${post.author.username} • ${post.timestamp}</p>
                    </div>
                </div>
            </div>
            <div class="post-content">
                <div class="post-image-container">
                    <img src="${post.image}" alt="Post image" class="post-image">
                </div>
                <p class="post-text">${post.content}</p>
            </div>
            <div class="post-actions">
                <button class="action-btn ${state.isLiked ? 'liked' : ''}" onclick="toggleLike('${post.id}')">
                    <i class="bi bi-hand-thumbs-up${state.isLiked ? '-fill' : ''}"></i> ${state.likesCount}
                </button>
                <button class="action-btn ${state.isDisliked ? 'disliked' : ''}" onclick="toggleDislike('${post.id}')">
                    <i class="bi bi-hand-thumbs-down${state.isDisliked ? '-fill' : ''}"></i> ${state.dislikesCount}
                </button>
            </div>
            <div class="comments-section">
                <div class="comments-list" id="comments-list-${post.id}">
                    ${state.comments.map(comment => `
                        <div class="comment">
                            <div class="comment-avatar"></div>
                            <div class="comment-content">
                                <p class="comment-author">${comment.author}</p>
                                <p>${comment.content}</p>
                            </div>
                        </div>
                    `).join('')}
                </div>
                <div class="comment-input-section">
                    <input type="text" class="comment-input" placeholder="Add a comment..." id="comment-input-${post.id}">
                    <button class="send-btn" onclick="addComment('${post.id}')">Send</button>
                </div>
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
    renderPosts();
}

function toggleDislike(postId) {
    const state = postStates[postId];
    if (state.isLiked) {
        state.isLiked = false;
        state.likesCount--;
    }
    state.isDisliked = !state.isDisliked;
    state.dislikesCount += state.isDisliked ? 1 : -1;
    renderPosts();
}

function addComment(postId) {
    const input = document.getElementById(`comment-input-${postId}`);
    const content = input.value.trim();
    if (content) {
        const state = postStates[postId];
        state.comments.push({ author: 'You', content });
        input.value = '';
        renderPosts();
    }
}

function switchFeed(feed) {
    currentFeed = feed;
    const tabs = document.querySelectorAll('.feed-tab');
    tabs.forEach(tab => tab.classList.remove('active'));
    document.querySelector(`.feed-tab[onclick="switchFeed('${feed}')"]`).classList.add('active');
    renderPosts();
}

function sortPosts(sortBy) {
    currentSort = sortBy;
    let posts = getFilteredPosts();

    posts.sort((a, b) => {
        const stateA = postStates[a.id];
        const stateB = postStates[b.id];

        switch (sortBy) {
            case 'oldest':
                return new Date(a.timestamp) - new Date(b.timestamp);
            case 'most-liked':
                return stateB.likesCount - stateA.likesCount;
            case 'least-liked':
                return stateA.likesCount - stateB.likesCount;
            case 'most-commented':
                return stateB.comments.length - stateA.comments.length;
            default: // newest
                return new Date(b.timestamp) - new Date(a.timestamp);
        }
    });

    renderPosts(posts);
}

function refreshPosts() {
    const refreshBtn = document.querySelector('.refresh-btn');
    const refreshIcon = refreshBtn.querySelector('.refresh-icon');

    refreshIcon.classList.add('spinning');
    refreshBtn.disabled = true;

    setTimeout(() => {
        renderPosts();
        refreshIcon.classList.remove('spinning');
        refreshBtn.disabled = false;
    }, 1000);
}