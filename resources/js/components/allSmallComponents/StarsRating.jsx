import React from "react";
import { RiStarFill, RiStarHalfFill, RiStarLine } from "react-icons/ri";

const StarsRating = ({ rating, totalReviews }) => {
  const stars = rating.rate;
  const star = Array.from({ length: 5 }, (_, idx) => {
    let number = idx + 0.5;
    return (
      <span key={idx} className="stars-rating">
        {stars >= idx + 1 ? (
          <RiStarFill className="star-icon" />
        ) : stars >= number ? (
          <RiStarHalfFill className="star-icon" />
        ) : (
          <RiStarLine className="star-icon" />
        )}
      </span>
    );
  });
  return (
    <div className="star-rating-wrapper">
      {star && star}
      <span className="total-stars">{stars && stars}</span>
      {/* <span className="total-reviews">({totalReviews && totalReviews} reviews )</span> */}
    </div>
  );
};

export default StarsRating;

StarsRating.defaultProps = {
  rating: {
    rate: 4.9,
    count: 120,
  },
  totalReviews: 120,
};
