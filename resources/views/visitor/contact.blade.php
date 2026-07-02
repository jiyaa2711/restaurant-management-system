@extends('layouts.user_layout')

@section('main')
<div class="contact_section layout_padding" style="min-height: 85vh; padding-bottom: 100px; background-color: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" style="margin-top: 50px; margin-bottom: 50px;">
                <h1 class="contact_taital" style="font-weight: bold; color: #198754; font-size: 45px;">Contact Us</h1>
                <p style="color: #666; font-size: 18px; max-width: 700px; margin: 0 auto;">
                    Have a question or feedback? Reach out to us and we’ll get back to you as soon as possible.
                </p>
            </div>
        </div>
        
        <div class="contact_section_2">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container" style="padding: 20px; border-right: 1px solid #eee;">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">Full Name</label>
                                <input type="text" class="form-control" name="name" 
                                       value="{{ Auth::user()->name }}" 
                                       style="border: 1px solid #ddd; height: 50px; border-radius: 8px; background: #fdfdfd;" readonly>
                            </div>
                            
                            <div class="mb-4">
                                <label style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="+91 XXXXX XXXXX"
                                       style="border: 1px solid #ddd; height: 50px; border-radius: 8px;" required>
                            </div>
                            
                            <div class="mb-4">
                                <label style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">Email Address</label>
                                <input type="email" class="form-control" name="email" 
                                       value="{{ Auth::user()->email }}" 
                                       style="border: 1px solid #ddd; height: 50px; border-radius: 8px; background: #fdfdfd;" readonly>
                            </div>
                            
                            <div class="mb-4">
                                <label style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">Your Message</label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Tell us how we can help..."
                                          style="border: 1px solid #ddd; border-radius: 8px;" required></textarea>
                            </div>
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success" 
                                        style="background-color: #198754; border: none; padding: 14px 40px; font-weight: bold; border-radius: 30px; width: 100%; letter-spacing: 1px;">
                                    SEND INQUIRY
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="map_container" style="padding: 20px;">
                        <div style="border-radius: 15px; overflow: hidden; border: 1px solid #eee; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117506.30510522198!2d72.43904576326164!3d23.020243444002622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fccd11794766164!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1711880000000!5m2!1sen!2sin" 
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                        
                        <div class="row mt-4 px-2">
                            <div class="col-6">
                                <h6 style="font-weight: bold; color: #198754;">Our Location</h6>
                                <p style="color: #777; font-size: 14px;">123 Flavor Street, <br>Ahmedabad, Gujarat</p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold; color: #198754;">Support</h6>
                                <p style="color: #777; font-size: 14px;">hello@restaurant.com<br>+91 98765 43210</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection