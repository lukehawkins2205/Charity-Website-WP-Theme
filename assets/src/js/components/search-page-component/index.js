import React, { Component } from 'react';
import MonthPicker from "../month-picker-component";
import Search from "../search-component";

class searchPageComponent extends Component {

    constructor(props) {
        super(props);

        this.state = {
            singleValue: {
                year: 2020,
                month: 12,
                isEvent: true,
                inputResults: '',
                server: '',
                renderPage: true,
                posts: [],
                firstPosts: [],
                pageOn: 1,
                prevPageOn: 1,
                hasRunGetDate: false,
                hasRunGetArticle: false
            }
        }
    }


    componentDidMount(){
        this.loadData()
    }

    componentDidUpdate(){

        if(this.state.singleValue.hasRunGetDate == true && this.state.singleValue.pageOn !== this.state.singleValue.prevPageOn){
            this.getDate()
        }else if(this.state.singleValue.hasRunGetArticle === true && this.state.singleValue.pageOn !== this.state.singleValue.prevPageOn){
            this.getArticleSearchResults()
        }else if(this.state.singleValue.pageOn !== this.state.singleValue.prevPageOn){
            this.loadData()
        }
    }

    loadData = () => {
    
        if (window.location.href.indexOf("articles") > 1) {

            $('#article-search').css({'display': 'block'})

            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/initialPostLoad?offset=${this.state.singleValue.pageOn}`,
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            firstPosts: returnedPosts,
                            isEvent: false,
                            renderPage: true,
                            prevPageOn: this.state.singleValue.pageOn
                        } 
                    } ), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })

           }else if (window.location.href.indexOf("events") > 1) {

            $('#event-search').css({'display': 'block'})

            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/search?offset=${this.state.singleValue.pageOn}`,
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            firstPosts: returnedPosts,
                            isEvent: true,
                            renderPage: true,
                            prevPageOn: this.state.singleValue.pageOn
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
        } else if (window.location.href.indexOf("Private-Lodge-Events") > 1) {

            $('#event-search').css({'display': 'block'})

            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/search?offset=${this.state.singleValue.pageOn}`,
                headers: { 'X-CUSTOM-HEADER': 'lodge-private' },
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            firstPosts: returnedPosts,
                            isEvent: true,
                            renderPage: true,
                            prevPageOn: this.state.singleValue.pageOn
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
        } else if (window.location.href.indexOf("Private-Lodge-Articles") > 1) {

            $('#article-search').css({'display': 'block'})


            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/initialPostLoad?offset=${this.state.singleValue.pageOn}`,
                headers: { 'X-CUSTOM-HEADER': 'lodge-private' },
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            firstPosts: returnedPosts,
                            isEvent: false,
                            renderPage: true,
                            prevPageOn: this.state.singleValue.pageOn
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
        }
    }




    getDate = (date) => {
       
        $('#btn-wipe-search-event').css({'display': 'block'})
        $('.event-search-date-wrap').css({'display': 'block'})

        let selectedMonth = 0;
        let selectedYear = 0;

        if(date === undefined){
            selectedMonth = this.state.singleValue.month
            selectedYear = this.state.singleValue.year
        }else{

            let month = 0;

            if(date.month < 10){
                month = '0' + date.month
            }else{
                month = date.month
            }
            selectedMonth = month
            selectedYear = date.year
        }
       

    if (window.location.href.indexOf("Private-Lodge-Events") > 1) {

        let pageOn = this.state.singleValue.pageOn;

            if(selectedMonth !== this.state.singleValue.month || selectedYear !== this.state.singleValue.year){
                pageOn = 1;
            }

            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/search?date=${selectedYear}${selectedMonth}&offset=${pageOn}`,
                headers: { 'X-CUSTOM-HEADER': 'lodge-private' },
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            prevPageOn: this.state.singleValue.pageOn,
                            hasRunGetDate: true,
                            month: selectedMonth,
                            year: selectedYear
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
        }else if(window.location.href.indexOf("events") > 1){
         
            let pageOn = this.state.singleValue.pageOn;

            if(selectedMonth !== this.state.singleValue.month || selectedYear !== this.state.singleValue.year){
                pageOn = 1;
            }
   
        $.ajax({
            url: `${lodgeData.root_url}//wp-json/lodge/v1/search?date=${selectedYear}${selectedMonth}&offset=${pageOn}`,
            type: 'GET',
            success: (returnedPosts) => {
    
                this.setState(prevState => ({
                    singleValue: {
                        ...prevState.singleValue,
                        posts: returnedPosts,
                        prevPageOn: this.state.singleValue.pageOn,
                        hasRunGetDate: true,
                        month: selectedMonth,
                        year: selectedYear
                    }
                }), () => {
                    if(returnedPosts.length === 0){
                        $('#next-btn').css({'display': 'none'})
                    }else{
                        $('#next-btn').css({'display': 'block'})
                    }
                })
            },
            error: (data) => {
                console.log('error with get post', data)
            }
        })
        }
    }




    getArticleSearchResults = () => {

        let str = $("#myInput").val();

      $('#btn-wipe-search').css({'display': 'block'})

        if (window.location.href.indexOf("Private-Lodge-Articles") > 1) {

            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', lodgeData.nonce);
                },
                url: `${lodgeData.root_url}//wp-json/lodge/v1/postSearch?title=${str}&offset=${this.state.singleValue.pageOn}`,
                headers: { 'X-CUSTOM-HEADER': 'lodge-private' },
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            prevPageOn: this.state.singleValue.pageOn,
                            hasRunGetArticle: true
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
        }else if(window.location.href.indexOf("articles") > 1){
            $.ajax({
                url: `${lodgeData.root_url}//wp-json/lodge/v1/postSearch?title=${str}&offset=${this.state.singleValue.pageOn}`,
                type: 'GET',
                success: (returnedPosts) => {
                    this.setState(prevState => ({
                        singleValue: {
                            ...prevState.singleValue,
                            posts: returnedPosts,
                            prevPageOn: this.state.singleValue.pageOn,
                            hasRunGetArticle: true
                        }
                    }), () => {
                        if(returnedPosts.length === 0){
                            $('#next-btn').css({'display': 'none'})
                        }else{
                            $('#next-btn').css({'display': 'block'})
                        }
                    })
                },
                error: (data) => {
                    console.log('error with get post', data)
                }
            })
        }
    }



    resetPosts = () => {
        this.setState(prevState => ({
            singleValue: {
                ...prevState.singleValue,
                posts: this.state.singleValue.firstPosts,
                pageOn: 1,
                hasRunGetDate: false,
                hasRunGetArticle: false
            }
        }), () => {
            $("#myInput").val('');
            $('#btn-wipe-search').css({'display': 'none'})
            $('.event-search-date-wrap').css({'display': 'none'})
            $('#btn-wipe-search-event').css({'display': 'none'})
        })
    }

    nextButton = (x) => {
        if(x !== 0){
            this.setState(prevState => ({
                singleValue: {
                    ...prevState.singleValue,
                    pageOn: x,
                    prevPageOn: prevState.singleValue.pageOn
                }
            }))
        }
     
    }





    render() {

        if(this.state.singleValue.renderPage){

            return (


                <section>
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-lg-4">
                                <div className="card card-bottom-margin box-shadow">
                                    <div className="card-body text-center text-lg-left">
                                        <div className="row search-row">
                                            <div className="col">
                                                <div class='heading-font'>Search</div>
                                            </div>
                                        </div>
                                        <div id="article-search">
                                            <div className="row search-row">
                                                <div className="col">
                                                    <div><textarea type="text" id="myInput" placeholder="Type keyword here"></textarea></div>
                                                </div>
                                            </div>
                                            <div className="row search-row">
                                                <div className="col">
                                                    <div>
                                                        <button type="button"
                                                                onClick={this.getArticleSearchResults}
                                                                className="btn-enlarge-animation btn-custom search-btn"
                                                                id="myBtn">Search <i className="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="row search-row">
                                                <div className="col d-flex justify-content-center justify-content-lg-start">
                                                    <div className="btn-enlarge-animation " id="btn-cancel-cont">
                                                        <button onClick={this.resetPosts} type="button"
                                                                className="btn-custom search-btn mt-3"
                                                                style={{display: "none"}}
                                                                id="btn-wipe-search">Cancel Search <i
                                                            className="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>l

                                        <div id="event-search">
                                            <div className="row search-row">
                                                <div className="col-12">
                                                    <MonthPicker date={this.getDate.bind(this)}></MonthPicker>
                                                </div>
                                                <div className="col-12 font-p event-search-date-wrap">
                                                    <br></br>
                                                    <div className='event-search-date-text'></div>
                                                </div>
                                            </div>
                                            <div className="row search-row">
                                                <div className="col d-flex justify-content-center justify-content-lg-start ">
                                                    <button onClick={this.resetPosts} type="button"
                                                            className="btn-custom search-btn mt-3"
                                                            style={{display: "none"}}
                                                            id="btn-wipe-search-event">Cancel Search <i
                                                        className="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col">
                                <div className="row">
                                    <div className="col">
                                    <Search data={this.state}></Search>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col d-flex justify-content-center">
                                        <div onClick={() => this.nextButton(this.state.singleValue.pageOn - 1)}  className="m-3 prev-next-btn card-enlarge-animation">
                                        <i className="fa-3x fas fa-chevron-circle-left"></i>
                                        </div>
                                        <div id="next-btn" onClick={() => this.nextButton(this.state.singleValue.pageOn + 1)} className=" m-3 prev-next-btn card-enlarge-animation">
                                        <i className="fa-3x fas fa-chevron-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            );
        }else{
            return (
                <p>Loading</p>
            )
        }


    }



}



export default searchPageComponent;