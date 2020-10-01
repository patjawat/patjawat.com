import React from 'react'
import Link from 'next/link'
import { useSelector, useDispatch } from 'react-redux'
import { useRouter } from 'next/router'


export default function header() {


  return (
    <nav id="top-nav" className="navbar fixed-top navbar-expand-lg navbar-dark">
    <div className="container">
      <a className="navbar-brand" href="#?">Patjawat</a>
      <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar" aria-controls="topnavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span className="navbar-toggler-icon" />
      </button>
      <div className="collapse navbar-collapse" id="topnavbar">
        <ul className="navbar-nav ml-auto">
        {/* <Link href="/" className="nav-item">
            <a className="nav-link">Home</a>
            </Link> */}
          <li className="nav-item dropdown">
            <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Home
            </a>
            <div className="dropdown-menu" aria-labelledby="navbarDropdown">
              <a className="dropdown-item" href="index.html">Home 1</a>
              <a className="dropdown-item" href="index-header-2.html">Home 2</a>
              <a className="dropdown-item" href="index-header-3.html">Home 3</a>
            </div>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#features">Features</a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#screens-title">Screenshots</a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#pricing">Pricing</a>
          </li>
          {/* <Link href="/blog" className="nav-item">
            <a className="nav-link">Blog</a>
            </Link> */}
          <li className="nav-item">
            <a className="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
        <a href="?" target="_blank"><button id="btn-download" className="btn btn-outline-light material-ripple">Download</button></a>
      </div>
    </div>
  </nav>

  )
}
