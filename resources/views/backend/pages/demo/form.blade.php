@extends('backend.layouts.master')

@section('styles')
<link href="{{ asset('public/backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Forms</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Forms</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
            <div class="card mb-3">
              <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Simple form</h3>
                Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
              </div>
                
              <div class="card-body">
                
                <form>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Email address (required)</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Your lucky number (required)</label>
                  <input type="number" class="form-control" id="exampleInputNumber1" aria-describedby="numberlHelp" placeholder="Enter number" required>
                  <small id="numberlHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Password (required)</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Check me out
                  </label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                                
              </div>                            
            </div><!-- end card-->          
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-3">
              <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Form grid</h3>
                More complex forms can be built using our grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.
              </div>
                
              <div class="card-body">
                
                <form autocomplete="off" action="#">
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" autocomplete="off">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="form-group">
                  <label for="inputAddress2">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Check me out
                    </label>
                  </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
                
              </div>              
            </div><!-- end card-->
      </div>

                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
            <div class="card mb-3">
              <div class="card-header">
                <h3><i class="fa fa-hand-pointer-o"></i> Single select boxes</h3>
                Select2 was designed to be a replacement for the standard <i>select</i> box that is displayed by the browser. By default it supports all options and operations that are available in a standard select box, but with added flexibility.
              </div>
                
              <div class="card-body">
                                
                <label for="example1">
                Select country: 
                </label>
                <select class="form-control select2" id="example1" multiple name="state">    
                  <option value="AR">Argentina</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BE">Belgium</option>
                  <option value="BR">Brazil</option>
                  <option value="BG">Bulgaria</option>
                  <option value="CA">Canada</option>
                  <option value="CN">China</option>
                  <option value="CO">Colombia</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="EG">Egypt</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France</option>
                  <option value="DE">Germany</option>
                  <option value="GR">Greece</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IE">Ireland</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JP">Japan</option>
                  <option value="KW">Kuwait</option>
                  <option value="MX">Mexico</option>
                  <option value="NL">Netherlands</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NO">Norway</option>
                  <option value="PK">Pakistan</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="ES">Spain</option>
                  <option value="SE">Sweden</option>
                  <option value="TR">Turkey</option>
                  <option value="GB">United Kingdom</option>
                  <option value="US">United States</option>
                </select>
                
              </div>                            
            </div><!-- end card-->          
        </div>
  </div>
@endsection

@section('scripts')
<script src="{{ asset('public/backend/assets/plugins/select2/js/select2.min.js') }}"></script>
<script>                
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
