import React, { useState, useEffect } from 'react';

import Link from 'next/link'
import axios from 'axios'

import { useSelector, useDispatch } from 'react-redux'
import { useRouter } from 'next/router'
import { NoteConsumer } from '../components/NoteProvider';
export default function Navigation() {

const counter = useSelector(state => state.book.numOfBooks);
const store = useSelector(state => state);
const API_URL = process.env.WORDPRESS_API_GENERAL
const [wp, setWp] = useState();

async function getWp() {
  let {data} = await axios(API_URL);
  setWp(data)
}

useEffect(() => {
  getWp()
}, []);

  return (
    <>
   <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
     <div className="container">
     <Link href="/">
  <a className="navbar-brand"> xxx</a>
  </Link>

  <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span className="navbar-toggler-icon" />
  </button>
  <div className="collapse navbar-collapse" id="navbarSupportedContent">
    <ul className="navbar-nav mr-auto">
      <li className="nav-item active">
      <Link href="/">
        <a className="nav-link">Home <span className="sr-only">(current)</span></a>
      </Link>
      </li>
      <li className="nav-item">
      <Link href="/blogs">
        <a className="nav-link">Blogs</a>
      </Link>

      </li>
      <li className="nav-item dropdown">
        <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div className="dropdown-menu" aria-labelledby="navbarDropdown">
          <a className="dropdown-item" href="#">Action</a>
          <a className="dropdown-item" href="#">Another action</a>
          <div className="dropdown-divider" />
          <a className="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li className="nav-item">
        <a className="nav-link disabled" href="#" tabIndex={-1} aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form className="form-inline my-2 my-lg-0">
      <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
      <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </div>
</nav>
{/* {wp ? wp.map((item, i) => (
  <>
{item.name}
  </>
)) : ''} */}
 {/* {JSON.stringify(wp)} */}
    </>

  )
}
