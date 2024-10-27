import React, { Component } from 'react'
import Newsitem from './Newsitem'
import Spinner from './Spinner';
import PropTypes from 'prop-types'

export class Newss extends Component {

  static defaultProps = {
    country: 'in',
    pagesize: 9,
    category: 'general',
  }

  static propTypes = {
    country: PropTypes.string,
    pagesize: PropTypes.number,
    category: PropTypes.string,
  }

  constructor(){
    super();
    this.state = {
      articles: [],
      loading: false,
      page: 1,
      
    }
}

    async componentDidMount(){
      let url = `https://newsapi.org/v2/top-headlines?country=${this.props.country}&category=${this.props.category}&apiKey=a089676547994e3689d482b197b75a39&page=1&pagesize=${this.props.pagesize}`;
      this.setState({loading:true})
      let data = await fetch(url);
      let parsdata = await data.json();
      console.log(parsdata);
      this.setState({articles: parsdata.articles, totalResults: parsdata.totalResults, loading:false})
    }

    hpc = async()=>{
      let url = `https://newsapi.org/v2/top-headlines?country=${this.props.country}&category=${this.props.category}&apiKey=a089676547994e3689d482b197b75a39&page=${this.state.page -1}&pagesize=${this.props.pagesize}`;
      this.setState({loading:true})
      let data = await fetch(url);
      let persdata = await data.json();
      this.setState({
        page: this.state.page - 1,
        articles : persdata.articles,
        loading:false
      })


    }

     hnc = async()=>{

      if(this.state.page +1 > Math.ceil(this.state.totalResults/this.props.pagesize)){

      }else{

      let url = `https://newsapi.org/v2/top-headlines?country=${this.props.country}&category=${this.props.category}&apiKey=a089676547994e3689d482b197b75a39&page=${this.state.page + 1}&pagesize=${this.props.pagesize}`;
      this.setState({loading:true})
      let data = await fetch(url);
      let persdata = await data.json(); 
      this.setState({
        page: this.state.page + 1,
        articles: persdata.articles,
        loading:false
      })
    }
    }

  render() {
    return (
      <div className="container my-3">
        <h1 className="text-center" style={{margin: "35px 0px"}}>Nevernews - Top Headlines</h1>
        {this.state.loading && <Spinner/>}
        

        <div className="row">

          {!this.state.loading && this.state.articles.map((element) => {
            return <div className="col-md-4" key={element.url} >
            <Newsitem title={element.title?element.title.slice(0,40):""} desc={element.description?element.description.slice(0,80):""} 
                      imgurl={element.urlToImage} url={element.url}/>
            </div>
        
          })}
        </div>
          <div className="container d-flex justify-content-between">
            
              <button disabled={this.state.page <= 1} type="button" className="btn btn-secondary" onClick={this.hpc}>&larr; Previous</button>
              <button disabled={this.state.page + 1 > Math.ceil(this.state.totalResults / this.props.pagesize)} type="button" className="btn btn-success" onClick={this.hnc}>Next&rarr;</button>

          </div>
       
      </div>
    )
  }
}

export default Newss
