import React from 'react'
import axios from 'axiox'
export default function Posts() {
    return (
<div id="posts" className="container-fluid">
  <div className="container">
    <h2 className="section-title aos-init aos-animate" data-aos="fade-up">Latest Postxx</h2>
    <span className="section-text aos-init aos-animate" data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy text ever.</span>
    <div className="row justify-content-center">
      <div className="col-sm-8 col-lg-3 post aos-init aos-animate" data-aos="fade-up" data-aos-delay={0}>
        <div>
          <img className="post-image" src="libs/images/post-1.png" alt="Post image" />
          <span className="post-date">November 14, 2018</span>
          <strong className="post-title">Lorem Ipsum is simply dummy text of the printing </strong>
          <span className="post-text">Lorem Ipsum is simply dummy text of the printing and ypesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the...</span>
          <a className="post-link" href="?" target="_blank">Read More</a>
        </div>
      </div>
      <div className="w-100 d-block d-lg-none" />
      <div className="col-sm-8 col-lg-3 post aos-init aos-animate" data-aos="fade-up" data-aos-delay={100}>
        <div>
          <img className="post-image" src="libs/images/post-2.png" alt="Post image" />
          <span className="post-date">November 14, 2018</span>
          <strong className="post-title">Lorem Ipsum is simply dummy text of the printing </strong>
          <span className="post-text">Lorem Ipsum is simply dummy text of the printing and ypesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the...</span>
          <a className="post-link" href="?" target="_blank">Read More</a>
        </div>
      </div>
      <div className="w-100 d-block d-lg-none" />
      <div className="col-sm-8 col-lg-3 post aos-init aos-animate" data-aos="fade-up" data-aos-delay={200}>
        <div>
          <img className="post-image" src="libs/images/post-3.png" alt="Post image" />
          <span className="post-date">November 14, 2018</span>
          <strong className="post-title">Lorem Ipsum is simply dummy text of the printing </strong>
          <span className="post-text">Lorem Ipsum is simply dummy text of the printing and ypesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the...</span>
          <a className="post-link" href="?" target="_blank">Read More</a>
        </div>
      </div>
    </div>
  </div>
</div>

    )
}
