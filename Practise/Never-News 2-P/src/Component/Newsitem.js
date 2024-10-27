import React, { Component } from 'react'

export class Newsitem extends Component {

  render() {
    let {title, desc, imgurl, url} = this.props;
    let dum = "https://s2.glbimg.com/0kGRfPsY_U02n0jSMGzxqF4j-64=/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/L/p/FUZ5KSSoWB7tQxZ6FviA/preview-share-2x.png";

    return (
      <div className='my-3'>

          <div  className="card" >

            <img src={imgurl?imgurl:dum}  className="card-img-top" alt="..."/>
              <div  className="card-body">
                <h5  className="card-title">{title}...</h5>
                <p  className="card-text">{desc}...</p>
                <a href={url} target="_blank" rel="noopener noreferrer" className="btn btn-primary">Read More</a>
              </div>
              
          </div>

      </div>
    )
  }
}

export default Newsitem