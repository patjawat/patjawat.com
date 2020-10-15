import React from 'react'

export default function Contact() {
    return (
       <div id="contact" className="container-fluid">
  <div className="container">
    <h2 className="section-title aos-init aos-animate" data-aos="fade-up">Contact-us</h2>
    <span className="section-text aos-init aos-animate" data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy text ever.</span>
    <div className="row">
      <div className="col-12 col-lg-6 aos-init aos-animate" data-aos="fade-right">
        <div className="map">
          <div className="address-box aos-init aos-animate" data-aos="fade-up" data-aos-delay={500} deta-aos-duration={500}>
            <strong>Head Office</strong>
            <address>5756 Station Road, NY</address>
            <span><i className="fas fa-phone" /> <span>669-221-6251</span></span>
            <span><i className="fas fa-envelope" /> <span>Design@gmail.com</span></span>
          </div>
          {/* <img className="location aos-init aos-animate" src="libs/images/location-icon.png" alt="Location" data-aos="fade-up" data-aos-delay={000} deta-aos-duration={500} /> */}
          {/* <img className="world" src="libs/images/map.png" alt="Map" /> */}
        </div>
      </div>
      <div className="col-lg-6 aos-init aos-animate" data-aos="fade-left">
        <form>
          <div className="form-row">
            <div className="form-group col-md-6">
              <input type="text" className="form-control" id="name" placeholder="Name" />
            </div>
            <div className="form-group col-md-6">
              <input type="email" className="form-control" id="email" placeholder="Email" />
            </div>
          </div>
          <div className="form-group">
            <input type="text" className="form-control" id="subject" placeholder="Subject" />
          </div>
          <div className="form-group">
            <textarea className="form-control" id="message" rows={5} placeholder="Message" defaultValue={""} />
          </div>
          <div className="form-group">
            <button type="submit" onclick="return false;" className="btn btn-outline-primary btn-outline-purple material-ripple">Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    )
}
