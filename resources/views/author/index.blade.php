<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Lingua News - Author Dashboard</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f5f5f5;
}

.dashboard{
display:flex;
min-height:100vh;
}

/* SIDEBAR */

.sidebar{
width:280px;
background:#000;
color:#fff;
display:flex;
flex-direction:column;
}

.logo{
padding:30px;
border-bottom:1px solid #222;
}

.logo h1{
font-size:32px;
}

.logo p{
color:#999;
margin-top:8px;
}

.menu{
padding:20px;
flex:1;
}

.menu a{
display:flex;
align-items:center;
gap:14px;
padding:15px 20px;
margin-bottom:10px;
border-radius:16px;
text-decoration:none;
color:white;
transition:.3s;
}

.menu a:hover{
background:#111;
}

.menu .active{
background:#e50914;
}

.logout{
padding:20px;
border-top:1px solid #222;
}

.logout button{
width:100%;
padding:14px;
border:none;
border-radius:16px;
background:white;
font-weight:600;
cursor:pointer;
transition:.3s;
}

.logout button:hover{
background:#ddd;
}

/* MAIN */

.main{
flex:1;
padding:40px;
}

/* TOPBAR */

.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:40px;
flex-wrap:wrap;
gap:20px;
}

.topbar h2{
font-size:40px;
}

.topbar p{
color:#777;
margin-top:10px;
}

.top-actions{
display:flex;
align-items:center;
gap:15px;
}

.search-box{
background:white;
padding:14px 18px;
border-radius:16px;
display:flex;
align-items:center;
gap:10px;
width:300px;
}

.search-box input{
border:none;
outline:none;
width:100%;
}

.create-btn{
background:black;
color:white;
padding:14px 22px;
border:none;
border-radius:16px;
cursor:pointer;
font-weight:600;
}

/* STATS */

.stats{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-bottom:40px;
}

.card{
background:white;
padding:25px;
border-radius:24px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.card-top{
display:flex;
justify-content:space-between;
align-items:center;
}

.card-icon{
width:60px;
height:60px;
background:#ffe5e5;
color:#e50914;
display:flex;
align-items:center;
justify-content:center;
border-radius:18px;
font-size:24px;
}

.card h3{
font-size:40px;
margin-top:20px;
}

.card p{
color:#777;
}

/* PERFORMANCE */

.performance-grid{
display:grid;
grid-template-columns:2fr 1fr;
gap:20px;
margin-bottom:40px;
}

.performance{
background:white;
padding:30px;
border-radius:24px;
}

.performance-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
}

.performance-header span{
background:#d1fae5;
color:#065f46;
padding:10px 16px;
border-radius:30px;
font-size:14px;
}

.progress-box{
margin-bottom:25px;
}

.progress-top{
display:flex;
justify-content:space-between;
margin-bottom:10px;
}

.progress{
width:100%;
height:14px;
background:#ddd;
border-radius:20px;
overflow:hidden;
}

.progress div{
height:100%;
}

.black{
background:black;
width:75%;
}

.red{
background:#e50914;
width:65%;
}

.blue{
background:#2563eb;
width:82%;
}

/* TRENDING */

.trending{
background:black;
color:white;
padding:30px;
border-radius:24px;
}

.trending-card{
background:#111;
padding:20px;
border-radius:20px;
margin-top:20px;
}

.badge{
background:#e50914;
padding:6px 12px;
border-radius:20px;
font-size:12px;
display:inline-block;
}

.trending-card h4{
margin-top:20px;
line-height:1.6;
}

/* TABLE */

.table-box{
background:white;
border-radius:24px;
overflow:hidden;
}

.table-header{
display:flex;
justify-content:space-between;
align-items:center;
padding:25px;
border-bottom:1px solid #eee;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#fafafa;
padding:18px;
text-align:left;
}

table td{
padding:20px;
border-bottom:1px solid #eee;
}

.status{
padding:8px 14px;
border-radius:20px;
font-size:14px;
font-weight:600;
}

.published{
background:#d1fae5;
color:#065f46;
}

.pending{
background:#fef3c7;
color:#92400e;
}

.draft{
background:#e5e7eb;
color:#374151;
}

.edit-btn{
background:black;
color:white;
padding:10px 18px;
border:none;
border-radius:12px;
cursor:pointer;
}

/* RESPONSIVE */

@media(max-width:992px){

.dashboard{
flex-direction:column;
}

.sidebar{
width:100%;
}

.performance-grid{
grid-template-columns:1fr;
}

}

</style>

</head>
<body>

<div class="dashboard">

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
<h1>Lingua News</h1>
<p>Author Panel</p>
</div>

<div class="menu">

<a href="#" class="active">
<i class="fa-solid fa-table-columns"></i>
Dashboard
</a>

<a href="#">
<i class="fa-solid fa-newspaper"></i>
My Articles
</a>

<a href="#">
<i class="fa-solid fa-pen"></i>
Create Article
</a>

<a href="#">
<i class="fa-solid fa-clock"></i>
Pending Review
</a>

<a href="#">
<i class="fa-solid fa-bell"></i>
Notifications
</a>

<a href="#">
<i class="fa-solid fa-gear"></i>
Settings
</a>

</div>

<div class="logout">
<button>Logout</button>
</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<div>
<h2>Welcome Back 👋</h2>
<p>Manage your articles and publishing workflow.</p>
</div>

<div class="top-actions">

<div class="search-box">
<i class="fa-solid fa-magnifying-glass"></i>
<input type="text" placeholder="Search articles...">
</div>

<button class="create-btn">
+ Create News
</button>

</div>

</div>

<!-- STATS -->

<div class="stats">

<div class="card">
<div class="card-top">
<div>
<p>Total Articles</p>
<h3>48</h3>
</div>

<div class="card-icon">
<i class="fa-solid fa-newspaper"></i>
</div>
</div>
</div>

<div class="card">
<div class="card-top">
<div>
<p>Published</p>
<h3>31</h3>
</div>

<div class="card-icon">
<i class="fa-solid fa-chart-line"></i>
</div>
</div>
</div>

<div class="card">
<div class="card-top">
<div>
<p>Pending Review</p>
<h3>9</h3>
</div>

<div class="card-icon">
<i class="fa-solid fa-clock"></i>
</div>
</div>
</div>

<div class="card">
<div class="card-top">
<div>
<p>Total Views</p>
<h3>12.4K</h3>
</div>

<div class="card-icon">
<i class="fa-solid fa-eye"></i>
</div>
</div>
</div>

</div>

<!-- PERFORMANCE -->

<div class="performance-grid">

<div class="performance">

<div class="performance-header">

<div>
<h2>Monthly Performance</h2>
<p>Your publishing statistics this month</p>
</div>

<span>Active Author</span>

</div>

<div class="progress-box">

<div class="progress-top">
<p>Article Completion</p>
<p>75%</p>
</div>

<div class="progress">
<div class="black"></div>
</div>

</div>

<div class="progress-box">

<div class="progress-top">
<p>Publishing Success</p>
<p>65%</p>
</div>

<div class="progress">
<div class="red"></div>
</div>

</div>

<div class="progress-box">

<div class="progress-top">
<p>Reader Engagement</p>
<p>82%</p>
</div>

<div class="progress">
<div class="blue"></div>
</div>

</div>

</div>

<!-- TRENDING -->

<div class="trending">

<h2>Trending Article</h2>

<p style="color:#999;margin-top:15px;">
Your top article reached 4.2K readers.
</p>

<div class="trending-card">

<span class="badge">SPORTS</span>

<h4>
Australian breaks fastest sea-to-summit Everest record
</h4>

<p style="margin-top:20px;color:#999;">
4.2K Views
</p>

</div>

</div>

</div>

<!-- TABLE -->

<div class="table-box">

<div class="table-header">

<div>
<h2>Recent Articles</h2>
<p style="color:#777;margin-top:6px;">
Manage your latest news
</p>
</div>

<a href="#" style="color:#e50914;text-decoration:none;">
View All
</a>

</div>

<table>

<thead>
<tr>
<th>Article</th>
<th>Category</th>
<th>Status</th>
<th>Views</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<tr>
<td>Australian breaks fastest sea-to-summit Everest record</td>
<td>Sports</td>
<td>
<span class="status published">
Published
</span>
</td>
<td>4.2K</td>
<td>26 May 2026</td>
<td>
<button class="edit-btn">
Edit
</button>
</td>
</tr>

<tr>
<td>Nepal tourism reaches new high in 2026</td>
<td>Travel</td>
<td>
<span class="status pending">
Pending
</span>
</td>
<td>1.3K</td>
<td>25 May 2026</td>
<td>
<button class="edit-btn">
Edit
</button>
</td>
</tr>

<tr>
<td>New football talents emerging from Kathmandu</td>
<td>Football</td>
<td>
<span class="status draft">
Draft
</span>
</td>
<td>800</td>
<td>24 May 2026</td>
<td>
<button class="edit-btn">
Edit
</button>
</td>
</tr>

</tbody>

</table>

</div>

</div>

</div>

<script>

console.log("Lingua News Author Dashboard Loaded");

</script>

</body>
</html>