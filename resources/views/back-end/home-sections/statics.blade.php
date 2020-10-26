<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="fa fa-youtube"></i>
          </div>
          <p class="card-category">Videos</p>
          <h3 class="card-title"> {{ $videos }}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <span class="material-icons">
                video_library
                </span>
             <a href="{{ route('videos.index') }}">All Videos...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="fa fa-book"></i>
          </div>
          <p class="card-category">Skills</p>
           <h3 class="card-title">{{ $skills }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
               <span class="material-icons">
                   book
                </span>
             <a href="{{ route('skills.index') }}">All Skills</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="fa fa-tags"></i>
          </div>
          <p class="card-category">Tags</p>
          <h3 class="card-title">{{ $tags }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
               <span class="material-icons">
                    style
                </span>
                  <a href="{{ route('tags.index') }}">All Tags</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
              <i class="fa fa-comments"></i>
            </div>
             <p class="card-category">Comments</p>
             <h3 class="card-title">{{ $comments }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
                   <span class="material-icons">
                        mode_comment
                    </span>
              <a href="{{ route('videos.index') }}">Check Videos</a>
            </div>
          </div>
        </div>
      </div>
</div>
