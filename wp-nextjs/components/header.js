import Link from 'next/link'

export default function Header() {
  return (
    <>
<ul className="nav justify-content-end">
  <li className="nav-item">
    <a className="nav-link active" href="#">Active</a>
  </li>
  <li className="nav-item">
    <a className="nav-link" href="#">Link</a>
  </li>
  <li className="nav-item">
    <a className="nav-link" href="#">Link</a>
  </li>
  <li className="nav-item">
    <a className="nav-link disabled" href="#" tabIndex={-1} aria-disabled="true">Disabled</a>
  </li>
</ul>


    </>
  )
}
