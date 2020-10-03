import React from 'react'
import Link from 'next/link'
import { useSelector, useDispatch } from 'react-redux'
import { useRouter } from 'next/router'
import { NoteConsumer } from '../components/NoteProvider';
export default function Navigation() {
// const context = Context;
const counter = useSelector(state => state.book.numOfBooks);
const store = useSelector(state => state);
  return (
    
    <nav id="top-nav" className="navbar fixed-top navbar-expand-lg navbar-dark">
    <div className="container">
      <a className="navbar-brand" href="#?">

      <NoteConsumer>
          {({ state, growAYearOlder }) => (
            
             state.age
          
          )}
  </NoteConsumer>
  {JSON.stringify(store)}
      </a>
      <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar" aria-controls="topnavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span className="navbar-toggler-icon" />
      </button>
      <div className="collapse navbar-collapse" id="topnavbar">
        <ul className="navbar-nav ml-auto">
          <li className="nav-item">
            <a className="nav-link" href="#header">Home</a>
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
