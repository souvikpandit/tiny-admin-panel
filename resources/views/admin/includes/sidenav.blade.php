<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar="">
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="index.php">
              <img src="{{ asset('backend/assets/apple-touch-icon.png') }}" alt="Prayukty Logo" srcset="">
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                    
                </a>
             </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Content Management</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
              
            <li class="nav-item dropdown">
              <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-file fe-16"></i>
                <span class="ml-3 item-text">Pages</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="pages">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('page') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('page.add') }}"><span class="ml-1 item-text">Add</span></a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
              
            <li class="nav-item dropdown">
              <a href="#media" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Media</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="media">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('media') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('media.add') }}"><span class="ml-1 item-text">Add</span></a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('site-settings') }}">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Site Settings</span>
                    
                </a>
             </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
              
            <li class="nav-item dropdown">
              <a href="#banner" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-alert-octagon fe-16"></i>
                <span class="ml-3 item-text">Banner</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="banner">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('banner') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('banner.add') }}"><span class="ml-1 item-text">Add</span></a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
              
            <li class="nav-item dropdown">
              <a href="#testimonials" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-folder fe-16"></i>
                <span class="ml-3 item-text">Testimonials</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="testimonials">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('testimonial') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('testimonial.add') }}"><span class="ml-1 item-text">Add</span></a>
            </li>
          </ul>
          
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Book Management</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-align-center"></i>
                <span class="ml-3 item-text">Category</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="category">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#author" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-users"></i>
                <span class="ml-3 item-text">Author</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="author">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#cover-artist" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-printer"></i>
                <span class="ml-3 item-text">Cover Artist</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="cover-artist">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#book" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-book"></i>
                <span class="ml-3 item-text">Book</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="book">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Blog Management</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#blog-category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-list fe-16"></i>
                <span class="ml-3 item-text">Category</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="blog-category">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('category.index') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('category.create') }}"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#blog-tags" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-tag fe-16"></i>
                <span class="ml-3 item-text">Tags</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="blog-tags">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('tag.index') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('tag.create') }}"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#blog-author" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Author</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="blog-author">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('author.index') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('author.create') }}"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#blog" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                
                <i class="fa-solid fa-blog"></i>
                <span class="ml-3 item-text">Blog</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="blog">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('blog.index') }}"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('blog.create') }}"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#blog-comment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-comment" aria-hidden="true"></i>
                <span class="ml-3 item-text">Comment</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="blog-comment">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Operations</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#partners" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-handshake" aria-hidden="true"></i>
                <span class="ml-3 item-text">Partners</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="partners">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#Advertisement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-ad"></i>
                <span class="ml-3 item-text">Advertisement</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="Advertisement">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>User Management</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#role" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                <span class="ml-3 item-text">Role</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="role">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#permission" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <span class="ml-3 item-text">Permission</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="permission">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">User</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="user">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <span class="ml-3 item-text">Menu</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="menu">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-color.php"><span class="ml-1 item-text">All</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="ui-typograpy.php"><span class="ml-1 item-text">Add</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="https://www.prayukty.com" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
            </a>
          </div>
        </nav>
      </aside>
