import React from 'react';

const BlogCard = ({ blog }) => {
	return (
		<div className="blog-card row">
			<div  className="left-wrapper col-md-5">
				<img className="blog-image" src={blog.image} alt="blog" />
			</div>
			<div className="right-wrapper col-md-7">
				<h4 className='card-title'>{blog.title}</h4>
				<p className='discription'>{blog.discription}</p>
                <button className='button'>Read More</button>
			</div>
		</div>
	);
};

export default BlogCard;
