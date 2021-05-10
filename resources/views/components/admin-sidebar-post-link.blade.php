<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-bullhorn"></i>
        <span>Manage Announcements</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Announcements:</h6>
        <a class="collapse-item" href="{{route('posts.create')}}">Create An Announcement</a>
        <a class="collapse-item" href="{{route('posts.index')}}">View All Announcements</a>
        </div>
    </div>
</li>