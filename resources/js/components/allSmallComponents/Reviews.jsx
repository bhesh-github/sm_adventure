import React from "react";
import { RiStarFill, RiStarHalfFill, RiStarLine } from "react-icons/ri";
import LoadmoreBtn from "./LoadmoreBtn";
import { useState } from "react";

const Reviews = ({ reviewsData }) => {
  const [sliceNum, setSliceNum] = useState(2);

  // Main Stars Analyse Function
  const starsArr =
    reviewsData &&
    reviewsData.map((item) => {
      return item.stars;
    });
  let starsArrSum = 0;
  for (let x of starsArr) {
    starsArrSum += x;
  }
  const analyseStarsResult = Math.floor(starsArrSum / starsArr.length);

  // Main Stars Analyse Graphic
  const mainStars = Array.from({ length: 5 }, (_, idx) => {
    let number = idx + 0.5;
    return (
      <span className="rating" key={idx}>
        {analyseStarsResult >= idx + 1 ? (
          <RiStarFill className="star-icon" />
        ) : analyseStarsResult >= number ? (
          <RiStarHalfFill className="star-icon" />
        ) : (
          <RiStarLine className="star-icon" />
        )}
      </span>
    );
  });

  // Review Card Component
  const reviewCard =
    reviewsData &&
    reviewsData.slice(0, sliceNum).map((item) => {
      const stars = item.stars;
      const starsGraphic = Array.from({ length: 5 }, (_, idx) => {
        let number = idx + 0.5;
        return (
          <span key={idx} className="rating">
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
        <div className="review-card row" key={item.id}>
          <div className="user-info col-lg-2">
            <div className="aligning">
              <img
                src={item.imageUrl}
                alt="user image"
                className="review-img rounded-circle img-thumbnail "
              />
              <div className="name-and-date">
                <p className="name">{item.name.slice(0, 10)}</p>
                <p className="date">{item.date}</p>
              </div>
            </div>
          </div>
          <div className="review-info col-lg-8">
            <span className="heading">{item.reviewTitle}</span>
            <p className="paragraph">{item.reviewDiscription}</p>
          </div>
          <div className="star-info col-lg-2">
            <span className="inner">
              <span className="star-count">{item.stars}</span>
              <span className="star-icon">{starsGraphic}</span>
              <button className="btn btn-sm caption-button rounded-3  ">
                {item.stars <= 1
                  ? "Bad"
                  : item.stars < 2.5
                  ? "Good"
                  : item.stars < 3.5
                  ? "Better"
                  : item.stars < 4.5
                  ? "Best"
                  : "Excellent"}
              </button>
            </span>
          </div>
          <hr className="hr-line" />
        </div>
      );
    });

  const handleShowMoreBtnClick = () => {
    sliceNum >= reviewsData.length - 1
      ? setSliceNum(2)
      : setSliceNum((prev) => {
          return prev + 2;
        });
  };
  return (
    <div className="reviews-wrapper">
      <div className="heading">Reviews</div>
      <div className="main-review-graphic">
        <span className="review-in-count">
          <span className="big">
            {analyseStarsResult && analyseStarsResult}
          </span>
          /5
        </span>
        <div className="star-rating-wrapper">{mainStars && mainStars}</div>
        <span className="total-reviews">
          based on {reviewsData && reviewsData.length} reviews
        </span>
      </div>
      <div className="review-cards-wrapper">{reviewCard && reviewCard}</div>
      <div className="show-more-button" onClick={handleShowMoreBtnClick}>
        {sliceNum >= reviewsData.length - 1 ? (
          <LoadmoreBtn ifMoreContain={false} />
        ) : (
          <LoadmoreBtn ifMoreContain={true} />
        )}
      </div>
    </div>
  );
};

export default Reviews;
