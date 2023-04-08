@extends('layouts.site')
@section('title', 'Lien he')
@section('content')
  <div class="col-md-12">
    <h1 class="text-danger text-center mt-4">THÔNG TIN LIÊN HỆ SHOP</h1>
    <div class="row">
        <div class="col-md-6 mt-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="col-md-6">
            <div class="container">
              <form action="action_page.php">
            
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
            
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            
                <label for="country">Country</label>
                <select id="country" name="country">
                  <option value="australia">Australia</option>
                  <option value="canada">Canada</option>
                  <option value="usa">USA</option>
                </select>
            
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:150px"></textarea>
            
                <input class="mb-4 " type="submit" value="Giui">
            
              </form>
            </div>
          </div>
    </div>
  </div>      
@endsection
