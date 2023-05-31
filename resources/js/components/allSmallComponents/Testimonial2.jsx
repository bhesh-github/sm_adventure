import React from "react";
import ReactPlayer from "react-player";
import { GrNext, GrPrevious } from "react-icons/gr";
import { useState } from "react";

const Testimonial2 = ({ testimonialData }) => {
  const [currentIndex, setCurrentIndex] = useState(0);
  const currentData = testimonialData[currentIndex];
  const { id, img, name, message } = currentData;

  const handleLeftClick = () => {
    const isFirstSlide = currentIndex === 0;
    const newIndex = isFirstSlide
      ? testimonialData.length - 1
      : currentIndex - 1;
    setCurrentIndex(newIndex);
  };
  const handleRightClick = () => {
    const isLastSlide = currentIndex === testimonialData.length - 1;
    const newIndex = isLastSlide ? 0 : currentIndex + 1;
    setCurrentIndex(newIndex);
  };
  return (
    <div className="testimonial-card-wrapper">
      <div className="testimonial-card" key={id}>
        <div className="testimonial-media-side">
          {currentData.mediaImg ? (
            <div
              className="testimonial-media-img"
              style={{ backgroundImage: `url(${currentData.mediaImg})` }}
            ></div>
          ) : (
            <div className="testimonial-media-video">
              <ReactPlayer
                url={currentData.mediaVideo}
                controls
                width="100%"
                height="100%"
              />
            </div>
          )}
        </div>
        <div className="testimonial-person-side">
          <div className="message-brief-wrapper">
            <p className="tour-or-place-name message-title">
              14 Days Brazil Tour
            </p>
            <p className="message">{message}</p>
            <p className="read-more">Read More</p>
            <hr className="message-brief-hr" />
            <p className="message-title">Other Stuffs..</p>
            <p className="message">{message}</p>
            <p className="read-more">Read More</p>
          </div>
          <div className="img-name-wrapper">
            <img
              className="testimonial-card-img"
              src={img}
              alt="testimonial-person-img"
            />
            <div className="person-name">{name}</div>
          </div>
        </div>
      </div>
      <GrPrevious
        className="testimonial-slider-left-icon icon"
        onClick={handleLeftClick}
      />
      <GrNext
        className="testimonial-slider-right-icon icon"
        onClick={handleRightClick}
      />
    </div>
  );
};

export default Testimonial2;

Testimonial2.defaultProps = {
  testimonialData: [
    {
      id: 0,
      img: "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cmFuZG9tJTIwcGVvcGxlfGVufDB8fDB8fA%3D%3D&w=1000&q=80",
      name: "Robin Stark",
      message:
        "I am delighted to share with you how great experience this has been working with you guys so far. After several training sessions with your staff, I can tell you that I´m really impressed with the quality and depth of your solution, as well as the professional support we have been receiving from all your team members. I really enjoy the professional setup, the training methodology and personal touch. I will not hesitate to recommend you and look forward to start operating.",
      mediaVideo: "https://www.youtube.com/watch?v=57OwmzUZ6C8",
    },
    {
      id: 1,
      img: "https://expertphotography.com/wp-content/uploads/2018/10/cool-profile-picture-natural-light.jpg",
      name: "Sujan Perry",
      message:
        "TravelCarma has proven to be a valuable resource for our company. The features and flexibility of the product along with the expert advice and support from the TravelCarma team has allowed us to drastically improve the efficiency of our reservation processes. We have been using TravelCarma for over two years now and the process has been simple and painless to switch from our previous systems.",
      mediaImg:
        "https://images.pexels.com/photos/2413238/pexels-photo-2413238.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
      id: 2,
      img: "https://media.istockphoto.com/id/638756792/photo/beautiful-woman-posing-against-dark-background.jpg?s=612x612&w=0&k=20&c=AanwEr0pmrS-zhkVJEgAwxHKwnx14ywNh5dmzwbpyLk=",
      name: "Bella Hadit",
      message:
        "The new version of the booking system of TravelCarma with various functions is great. The quotations manager, hotels de-duplication, and the map based search options are so strong functions from B2B business prospective. Their B2B system is easy to understand and saves a lot of time of our agents. I gambled peanuts and got a Boeing 407.",
      mediaImg:
        "https://images.pexels.com/photos/5390339/pexels-photo-5390339.jpeg",
    },
    {
      id: 3,
      img: "https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlciUyMHByb2ZpbGV8ZW58MHx8MHx8&w=1000&q=80",
      name: "John Sharma",
      message:
        "We have been using TravelCarma for over 5 years for serving our large retail customer and agent base. They provide a really useful and scalable booking platform for flights, hotels and activities, developed after a lot of research in the field of tourism and includes several travel management features required by companies like ours.",
      mediaImg:
        "https://images.pexels.com/photos/2253640/pexels-photo-2253640.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
  ],
};
