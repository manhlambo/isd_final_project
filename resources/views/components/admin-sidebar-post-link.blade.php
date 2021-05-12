<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapsePost">
        <i class="fas fa-bullhorn"></i>
        <span>Manage Announcements</span>
    </a>
    <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Announcements:</h6>
        <a class="collapse-item" href="{{route('posts.create')}}">Create An Announcement</a>
        <a class="collapse-item" href="{{route('posts.index')}}">View All Announcements</a>
        </div>
    </div>
</li>