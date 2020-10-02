import React from 'react'

export default function header() {
    return (
        <div id="header" className="container-fluid">
        <div className="container">
          <div className="row">
            <div className="header-content col-lg-8 aos-init aos-animate" data-aos="fade-right">
              <h2 className="header-title">BEST LANDING PAGE FOR YOUR APP</h2>
              <span className="header-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text.
              </span>
              <div className="apps-icons d-flex justify-content-around justify-content-sm-start">
                <a href="?" target="_blank"><button id="appstore" className="btn btn-outline-light material-ripple mr-sm-3">App store</button></a>
                <a href="?" target="_blank"><button id="googleplay" className="btn btn-outline-light material-ripple">Google play</button></a>
              </div>
            </div>
            <div className="col-lg-4 d-none d-lg-block aos-init aos-animate" data-aos="fade-left">
              <img id="iphonex" src="libs/images/iphonex-mockup.png" alt />
            </div>
          </div>
        </div>
      </div>
    )
}
