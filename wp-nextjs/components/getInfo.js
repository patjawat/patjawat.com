import { useQuery, useMutation } from "@apollo/react-hooks";
import { gql } from "apollo-boost";

const GET_INFO = gql`
    query AllPosts {
        posts(first: 20, where: { orderby: { field: DATE, order: DESC } }) {
                edges {
                  node {
                    title
                    excerpt
                    slug
                    date
                    featuredImage {
                      node {
                        sourceUrl
                      }
                    }
                    author {
                      node {
                        name
                        firstName
                        lastName
                        avatar {
                          url
                        }
                      }
                    }
                  }
                }
              }
          allSettings {
            discussionSettingsDefaultCommentStatus
            discussionSettingsDefaultPingStatus
            generalSettingsDateFormat
            generalSettingsDescription
           
          }
        }
    
  
`;



const GetInfo = () => {
  const { loading, error, data } = useQuery(GET_INFO);


  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  return (
    <div>
      <p>
        {/* {data.book.name} - {data.book.author} */}
        {JSON.stringify(data)}
      </p>
    </div>
  );
};

export default GetInfo;