import Head from 'next/head'
import Header from '../layouts/selection/header'
import MyLayout from "../layouts/MyLayout";
export default function Home(props) {

  return (
  <div>
<Header />

</div>

  )
}



Home.Layout = MyLayout;