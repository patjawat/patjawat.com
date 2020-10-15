import Head from 'next/head'
import Header from '../layouts/selection/header'
import MyLayout from "../layouts/MyLayout";
import Features from '../layouts/selection/features';
import Screens from '../layouts/selection/screens';
import Videos from '../layouts/selection/videos';
import Teams from '../layouts/selection/teams';
import Prices from '../layouts/selection/prices';
import Posts from '../layouts/selection/posts';
import Contact from '../layouts/selection/contact';
import Download from '../layouts/selection/download';
import Footer from '../layouts/selection/footer';
export default function Home(props) {

  return (
  <div>
<Header />


<Features />
<Screens />
<Videos />
<Teams />
<Prices />
<Posts />
<Contact />
<Download />
<Footer />
</div>

  )
}



Home.Layout = MyLayout;