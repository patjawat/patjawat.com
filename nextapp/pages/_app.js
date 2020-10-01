import React,{useState} from "react";
import Router from 'next/router';
// import '../styles/globals.css'
// import 'bootstrap/dist/css/bootstrap.min.css';
import LoadingScreen from '../components/loadingScreen'

// add nprogress module
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';

function MyApp({ Component, pageProps }) {

  const [loading, setLoading] = useState(false)
  
  Router.onRouteChangeStart = (url) => {
    NProgress.start()
    setLoading(true)

  };
  
  Router.onRouteChangeComplete = (url) => {
    NProgress.done()
    setLoading(false)
  };
  
  Router.onRouteChangeError = (err, url) => {
    NProgress.done()
    setLoading(false)

  }; 


  // return <Component {...pageProps} />


  const Layout = Component.Layout ? Component.Layout : React.Fragment;

  return (
    // <Provider store={store}>
      <Layout>
        {loading ? <LoadingScreen /> : ''}
        <Component {...pageProps} />
      </Layout>
    // </Provider>
  )
}

// }

export default MyApp
