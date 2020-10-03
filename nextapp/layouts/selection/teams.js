import React from 'react'

export default function Teams() {
    return (
       <div id="team" className="container-fluid">
  <div className="container aos-init" data-aos="fade-up" data-aos-duration={2500}>
    <h2 className="section-title aos-init" data-aos="fade-up">Our team members</h2>
    <div className="round-slider-container no-transition" style={{opacity: 1}}>
      <div className="slider-controls">
        <i onclick="$('.team-members').slick('slickPrev');" className="slider-prev material-ripple slick-arrow" style={{}} />
        <i onclick="$('.team-members').slick('slickNext');" className="slider-next material-ripple slick-arrow" style={{}} />
      </div>
      <div className="round-slider-images">
        <div className="image-1">
          <img src="libs/images/team-2.png" alt />
        </div>
        <div className="image-2">
          <img src="libs/images/team-4.png" alt />
        </div>
        <div className="image-3">
          <img src="libs/images/team-1.png" alt />
        </div>
        <div className="image-4">
          <img src="libs/images/team-3.png" alt />
        </div>
        <div className="image-5">
          <img src="libs/images/team-5.png" alt />
        </div>
        <div className="next-slide no-transition">
          <img src="libs/images/team-2.png" alt />
        </div>
        <div className>
          <img src="libs/images/team-4.png" alt />
        </div>
        <div className>
          <img src="libs/images/team-1.png" alt />
        </div>
        <div className>
          <img src="libs/images/team-3.png" alt />
        </div>
        <div className="prev-slide no-transition">
          <img src="libs/images/team-5.png" alt />
        </div>
      </div>
    </div>
    <div className="team-members slick-initialized slick-slider slick-dotted">
      <div className="slick-list draggable"><div className="slick-track" style={{opacity: 1, width: 6105, transform: 'translate3d(-555px, 0px, 0px)'}}><div className="slick-slide slick-cloned" data-slick-index={-1} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Ian</strong>
              <span className="member-career">Back-end Developer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide slick-current slick-active" data-slick-index={0} aria-hidden="false" style={{width: 555}}>
            <div>
              <strong className="member-name">Selena</strong>
              <span className="member-career">UI/UX Designer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-instagram" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide" data-slick-index={1} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Paul</strong>
              <span className="member-career">Graphic Designer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-instagram" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide" data-slick-index={2} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">John</strong>
              <span className="member-career">Front-end Developer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide" data-slick-index={3} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Elina</strong>
              <span className="member-career">Digital Designer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-linkedin" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide" data-slick-index={4} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Ian</strong>
              <span className="member-career">Back-end Developer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide slick-cloned" data-slick-index={5} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Selena</strong>
              <span className="member-career">UI/UX Designer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-instagram" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide slick-cloned" data-slick-index={6} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Paul</strong>
              <span className="member-career">Graphic Designer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-instagram" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide slick-cloned" data-slick-index={7} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">John</strong>
              <span className="member-career">Front-end Developer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide slick-cloned" data-slick-index={8} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Elina</strong>
              <span className="member-career">Digital Designer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-linkedin" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
              </div>
            </div>
          </div><div className="slick-slide slick-cloned" data-slick-index={9} aria-hidden="true" style={{width: 555}}>
            <div>
              <strong className="member-name">Ian</strong>
              <span className="member-career">Back-end Developer</span>
              <span className="member-about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and.</span>
              <div className="member-social">
                <a href="?" target="_blank"><i className="fab fa-google-plus-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-facebook-square" /></a>
                <a href="?" target="_blank"><i className="fab fa-twitter-square" /></a>
              </div>
            </div>
          </div></div></div>
      <ul className="slick-dots" style={{}}><li className="slick-active" /><li /><li /><li /><li /></ul></div>
  </div>
</div>

    )
}
