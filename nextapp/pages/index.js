import React from "react"
import { ApolloProvider } from "@apollo/react-hooks";
import ApolloClient, { gql } from "apollo-boost";
import  BookInfo from './api/BookInfo'
import Header from '../layouts/selection/header'
import Navigation from '../layouts/navigation'
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
import Getinfo from '../components/getInfo'


const Index = ({ data }) => {
  const client = new ApolloClient({
    uri: process.env.WORDPRESS_API_URL,
    
  });


  return (
    <ApolloProvider client={client}>
      
      {JSON.stringify(data)}
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
        <h1>NextJS 
          
          GraphQL Apollo App</h1>
        <BookInfo />
      </div>
      <Getinfo />
    </ApolloProvider>
  );
};

export default Index;
Index.Layout = MyLayout;
