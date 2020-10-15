import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useRouter, withRouter } from "next/router";
import { Fragment } from 'react'
import ErrorPage from 'next/error'
import MyLayout from "../../layouts/MyLayout";

const Users = () => {
  const { query: { slug },
  } = useRouter();
  return <span>The user id is {slug}</span>;
};
// or
const User = withRouter(({ router: { query: { slug } } }) => (
  <span>The user id is {slug}</span>
));


export default function Post({ url }) {

  const router = useRouter()
  const slug = router.query.slug;
  const API_URL = process.env.WORDPRESS_API_URL
  const [posts, setPosts] = useState();

  async function getPosts() {
    let post = await axios(`http://127.0.0.1:81/wp-json/wp/v2/posts?slug=${ slug }`);
    setPosts(post.data)
  }

  useEffect(() => {
    getPosts()
  }, []);

  return (
    <>
  {posts ? posts.map((item, i) => (
<>
{/* {JSON.stringify(item)} */}
  <h1>{item.title.rendered}</h1>
  <div className="max-w-2xl mx-auto">
      <div
       
        dangerouslySetInnerHTML={{ __html: item.content.rendered }}
      />
    </div>
</>
)) : ''}
    </>
  )
}
Post.Layout = MyLayout;

