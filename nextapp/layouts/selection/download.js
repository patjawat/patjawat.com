import React from 'react'

export default function Download() {
    return (
       <div id="download" className="container-fluid">
  <div className="container">
    <div className="row justify-content-md-center">
      <div className="col-lg-4 d-none d-lg-block aos-init aos-animate" data-aos="fade-right">
        <div className="app-screenshot">
          <img src="libs/images/iphonex-mockup.png" alt="App screenshot" />
        </div>
      </div>
      <div className="col-lg-6 aos-init aos-animate" data-aos="fade-left">
        <h2 className="section-title">Download our APP from store</h2>
        <span className="section-text">Lorem Ipsum is simply dummy text of the
          printing and typesetting industry. Lorem Ipsum
          has been the industry's standard dummy text
          ever since the 1500s.</span>
        <div className="apps-icons d-flex justify-content-around justify-content-sm-start">
          <a href="?" target="_blank"><button id="appstore" className="btn btn-outline-light material-ripple mr-sm-3">App store</button></a>
          <a href="?" target="_blank"><button id="googleplay" className="btn btn-outline-light material-ripple">Google play</button></a>
        </div>
      </div>
    </div>
  </div>
</div>

    )
}
