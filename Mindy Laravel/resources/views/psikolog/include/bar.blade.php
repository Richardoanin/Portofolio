<header class="navbar navbar-expand-lg navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
  <div class="container-fluid">
      <a class="navbar-brand" href="/">Mindy</a>
      <div class="d-flex align-items-center">
          <div class="flex-shrink-0 dropdown">
              <label for="profile2" class="profile-dropdown">
                  <img src="/gambar/{{auth()->user()->gambar}}" alt="mdo" style="width: 40px;height: 40px;left: 1340px;top: 20px;"
                      class="rounded-circle">
          </div>
      </div>
  </div>
</header><br>

<div class="container-fluid">
  <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
          style="min-height: 100vh;">
          <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link" href="jadwal/{{auth()->user()->id}}">
                          Jadwal
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/chat">
                          Chat
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/profil/{{auth()->user()->id}}">
                          Profile
                      </a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
</div>