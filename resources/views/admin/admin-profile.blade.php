@include('admin.partials.header-section')
{{-- {{$countries}} --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{!!$name->name!!}</h3>

                <p class="text-muted text-center">Software Engineer</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Profile" data-toggle="tab">Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="Profile">
                    <form class="row g-3">
                        <div class="col-md-6">
                          {{-- <label for="inputEmail4" class="form-label">Name</label> --}}
                          {!! Form::label('name', 'Name', ['class'=>'form-label'])!!}
                          {{-- <input type="text" class="form-control" id="inputEmail4"> --}}.
                          {!! Form::text('name',  (!empty($name->name)) ? $name->name : old('name') ,['class'=>'form-control' ,'id'=>'name']) !!}
                          <p class="text-danger" id="name-error">sdfds</p>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('email', 'Email Address', ['class'=>'form-label'])!!}
                            {!! Form::text('email',  (!empty($name->email)) ? $name->email : old('email') ,['class'=>'form-control' ,'id'=>'email','readonly']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('phoneNumber', 'Phone Number', ['class'=>'form-label'])!!}
                            {!! Form::text('phoneNumber',  (!empty($name->phoneNumber)) ? $name->phoneNumber : old('phoneNumber') ,['class'=>'form-control' ,'id'=>'phoneNumber']) !!}
                            <p class="text-danger" id="phoneNumber-error">sdfds</p>
                        </div>
                          <div class="col-md-6">
                            {!! Form::label('DOB', 'Date Of Birth', ['class'=>'form-label'])!!}
                            {!! Form::date('DOB',  (!empty($name->DOB)) ? $name->DOB : old('DOB') ,['class'=>'form-control' ,'id'=>'phoneNumber']) !!}
                            <p class="text-danger" id="DOB-error">sdfds</p>
                          </div>
                          <div class="col-md-6">
                            {!! Form::label('Bio', 'Your Bio', ['class'=>'form-label'])!!}
                            {!! Form::textarea('Bio',  (!empty($name->Bio)) ? $name->Bio : old('Bio') ,['class'=>'form-control' ,'id'=>'phoneNumber','rows'=>'2']) !!}
                            <p class="text-danger" id="Bio-error">sdfds</p>
                        </div>
                          <div class="col-md-6">
                            {!! Form::label('Gender', 'Date Of Birth', ['class'=>'form-label'])!!}
                            <div class="form-check">
                                {!! Form::radio('gender', 'Male', ($name->gender == 'Male') ? true : false , ['class'=>'form-check-input','id'=>'gender']) !!}
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                {!! Form::radio('gender', 'Male', ($name->gender == 'Female') ? true : false , ['class'=>'form-check-input','id'=>'gender']) !!}
                                <label class="form-check-label" for="flexRadioDefault2">  Female</label>
                              </div>
                            <p class="text-danger" id="gender-error">sdfds</p>
                          </div>
                        <div class="col-12">
                            {!! Form::label('Street', 'Address', ['class'=>'form-label'])!!}
                            {!! Form::text('address',  (!empty($name->Address)) ? $name->Address : old('Address') ,['class'=>'form-control' ,'id'=>'name']) !!}
                        </div>
                        <div class="col-12">
                            {!! Form::label('address', 'Address 2', ['class'=>'form-label'])!!}
                            {!! Form::text('street2',  (!empty($name->street2)) ? $name->street2 : old('street2') ,['class'=>'form-control' ,'id'=>'name']) !!}                        </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Country</label>
                                <select id="inputState" class=" form-control form-select">
                                    <option selected>Choose...</option>
                                @foreach ($countries as $item)
                                <option value="{!!$item->name!!}" county_id="{!!$item->id!!}" shortname="{!!$item->shortname!!}" phonecode="{!!$item->phonecode!!}">{!!$item->name!!}</option>
                                @endforeach
                            </select>
                              </div>

                        <div class="col-md-4">
                            <label for="inputState" class="form-label">State</label>
                            <select id="inputState" class=" form-control form-select">
                              <option selected>Choose...</option>
                              <option>...</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label for="inputState" class="form-label">City</label>
                            <select id="inputState" class=" form-control form-select">
                              <option selected>Choose...</option>
                              <option>...</option>
                            </select>
                          </div>
                        <div class="col-md-4">
                          <label for="inputZip" class="form-label">Zip</label>
                          <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Upload Profile</label>
                            <input type="file" class="form-control" id="inputZip">
                          </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary text-center" style=" margin: 13px 0 0 0;
                        ">Update Now </button>
                        </div>
                      </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('admin.partials.footer-part')

