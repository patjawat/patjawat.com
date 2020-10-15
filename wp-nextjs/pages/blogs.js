
import React, { useState, useEffect,Suspense } from 'react';
import axios from 'axios'
import Link from 'next/link'

import MyLayout from "../layouts/MyLayout";

export default function Blogs() {
    const API_URL = process.env.WORDPRESS_API_URL
    const [posts, setPosts] = useState([]);
    const [page, setPage] = useState(1);
    const [nrofpages, setNumberofpage] = useState(1);


    const handlePrevPage = () => setPage(page - 1 ? page - 1 : 1);
    const handleNextPage = () => setPage(page < nrofpages ? page + 1 : nrofpages);

    async function getPosts() {
        // let post = await axios(API_URL + 'posts');
        let post = await axios(API_URL + 'posts?_embed');
        setPosts(post.data)
    }

    useEffect(() => {
        getPosts()
    }, [page, setPosts]);

    return (
        <>
                    <div className="posts-app__post-nav">
        <button onClick={handlePrevPage}>Newer posts</button>
        <p>Page {page} of {nrofpages}</p>
        <button onClick={handleNextPage}>Older posts</button>
      </div>
      

            <div class="row">
                {posts ? posts.map((item, i) => (

                    <div class="col-md-4">
                        <div class="card mb-4 shadow">
                        <Showthumbnail items={item}/>
                    
                            <p>{item.title.rendered}</p>
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <Link as={`/posts/${item.slug}`} href="/posts/[slug]">
        <a className="nav-link">Home <span className="sr-only">(current)</span></a>
      </Link>

      
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                )) : ''}
            </div>


        </>
    )
}
Blogs.Layout = MyLayout;

function Showthumbnail(props){
    const data = props.items.better_featured_image
    
    return  (data ? <img src={data.source_url} /> : <svg className="bd-placeholder-img card-img-top" width="100%" height={225} xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
)


    
}
