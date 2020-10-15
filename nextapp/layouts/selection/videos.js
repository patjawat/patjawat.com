import React from 'react'

export default function Videos() {
    return (
       <div id="video" className="container-fluid">
  <div className="container">
    <h2 className="section-title aos-init" data-aos="fade-up">Play this video</h2>
    <span className="section-text aos-init" data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy text ever</span>
    <div className="video-thumbnail aos-init" data-aos="zoom-in">
      <div className="video-play-button">
        <i href="https://gfycat.com/ifr/PassionateAncientCod" className="video-popup play-button material-ripple" />
        <i className="play-animation" />
        <i className="play-animation" />
        <i className="play-animation" />
      </div>
      <img src="libs/images/video-thumbnail.jpg" alt="Video" />
    </div>
  </div>
</div>

    )
}
