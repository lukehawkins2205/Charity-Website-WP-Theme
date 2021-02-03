import React from 'react';


class searchBox extends React.Component {


    constructor(props) {

        super(props)

        this.state = {
            singleValue: {
                render: true,
                initialPostsLoaded: false,
            }
        }

    }


    render() {


        if(this.state.singleValue.render){

            let styles;

           if(this.props.data.singleValue.isEvent){
               styles = {
                   display: 'block'
               }
           }else{
               styles = {
                   display: 'none'
               }
           }


            return(
                <div className="row">
                    {this.props.data.singleValue.posts.map((singlePost) => (
                        <div className="card-enlarge-animation col-12 col-md-6 news-col">
                            <a className="card-link-wrap" href={singlePost.permalink}>
                                <div className="card card-wrap box-shadow">
                                    <div className="card-image-wrap"><img className="card-image" src={singlePost.image}></img></div>
                                    <div className="card-body text-center d-flex align-items-center flex-column">
                                        <div className="ie-width-100">
                                            <div>
                                                <h4 className="font-link">{singlePost.title}</h4>
                                            </div>
                                            <div style={styles}>
                                                <div className="event-cont">
                                                    <p className="d-inline event-p-date events-date-wrap">{singlePost.eventDate} | {singlePost.eventTime}</p>
                                                </div>
                                                <div className="font-p">
                                                    <p className="font-p"><span className="location-cont">Location: </span>{singlePost.location}</p>
                                                </div>
                                            </div>
                                            <div className='font-p'>
                                                <p>{singlePost.excerpt}</p>
                                            </div>
                                            <br></br>
                                            <br></br>
                                            <div className="mt-auto card-link font-link">
                                                - Read More -
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ))}
                </div>
            )
        }else{
            return (
                <div>Loading...</div>
            )
        }

    }










}
export default searchBox















