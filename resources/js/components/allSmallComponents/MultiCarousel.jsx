import React from "react";
import Carousel from "react-multi-carousel";
import "react-multi-carousel/lib/styles.css";
const responsive = {
  // the naming can be any, depends on you.
  superLargeDesktop: {
    breakpoint: { max: 4000, min: 1190 },
    items: 4,
    slidesToSlide: 2,
  },
  desktop: {
    breakpoint: { max: 1190, min: 1024 },
    items: 4,
    slidesToSlide: 2,
  },
  big: {
    breakpoint: { max: 1024, min: 1000 },
    items: 4,
    slidesToSlide: 2,
  },
  mid: {
    breakpoint: { max: 1000, min: 600 },
    items: 3,
    slidesToSlide: 2,
  },
  tablet: {
    breakpoint: { max: 600, min: 464 },
    items: 2,
    slidesToSlide: 2,
  },
  mobile: {
    breakpoint: { max: 464, min: 0 },
    items: 2,
    slidesToSlide: 1,
  },
};

const MultiCarousel = ({ topInboundTours }) => {
  return (
    <div className="multi-carousel">
      <Carousel responsive={responsive} className="carousel">
        {topInboundTours}
      </Carousel>
    </div>
  );
};
export default MultiCarousel;