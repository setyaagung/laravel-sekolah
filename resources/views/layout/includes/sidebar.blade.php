<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="/dashboard"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				@if(auth()->user()->role == 'admin')
					<li><a href="/siswa"><i class="lnr lnr-users"></i> <span>Siswa</span></a></li>
					<li><a href="/posts"><i class="lnr lnr-pencil"></i> <span>Posts</span></a></li>
				@endif
			</ul>
		</nav>
	</div>
</div>