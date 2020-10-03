import React from 'react'

export default function Prices() {
    return (
<div id="pricing" className="container-fluid">
  <div className="container">
    <h2 id="pricing-title" className="section-title aos-init aos-animate" data-aos="fade-up">Pricing plan</h2>
    <span className="section-text aos-init aos-animate" data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy text ever</span>
    <div className="row justify-content-center">
      <div className="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 aos-init aos-animate" data-aos="fade-right">
        <div id="box-1" className="white-box">
          <span className="box-icon" />
          <strong className="box-title">Basic</strong>
          <span className="box-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</span>
          <strong className="box-price">$12</strong>
          <a href="?" target="_blank"><button type="button" className="btn btn-outline-primary btn-outline-purple material-ripple">Purchase</button></a>
        </div>
      </div>
      <div className="w-100 d-block d-lg-none" />
      <div className="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 aos-init aos-animate" data-aos="flip-left">
        <div id="box-2" className="white-box">
          <span className="box-icon" />
          <strong className="box-title">Premuim</strong>
          <span className="box-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</span>
          <strong className="box-price">$20</strong>
          <a href="?" target="_blank"><button type="button" className="btn btn-outline-primary btn-outline-purple material-ripple">Purchase</button></a>
        </div>
      </div>
      <div className="w-100 d-block d-lg-none" />
      <div className="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 aos-init aos-animate" data-aos="fade-left">
        <div id="box-3" className="white-box">
          <span className="box-icon" />
          <strong className="box-title">Ultimate</strong>
          <span className="box-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</span>
          <strong className="box-price">$35</strong>
          <a href="?" target="_blank"><button type="button" className="btn btn-outline-primary btn-outline-purple material-ripple">Purchase</button></a>
        </div>
      </div>
    </div>
  </div>
</div>

    )
}
