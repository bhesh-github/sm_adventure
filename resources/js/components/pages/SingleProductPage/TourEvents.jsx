import React from "react";

const TourEvents = ({ tourEvents }) => {
  const eventIntroCards = tourEvents.map((item) => (
    <div className="events-intro-cards" key={item.id}>
      <div
        className="event-image"
        style={{
          backgroundImage: `url(${item.eventImage})`,
        }}
      ></div>
      <div className="event-title-and-summary">
        <span className="event-title">{item.eventName}</span>
        <span className="event-summary">{item.eventSummary}</span>
      </div>
    </div>
  ));
  return (
    <div className="what-you-can-expect-wrapper">
      <div className="what-you-can-expect-heading">What You can Expect</div>
      {eventIntroCards}
    </div>
  );
};

export default TourEvents;

TourEvents.defaultProps = {
  tourEvents: [
    {
      id: 0,
      eventImage:
        "https://images.pexels.com/photos/15328962/pexels-photo-15328962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      eventName: "Board Rafting",
      eventSummary:
        "Take an adventurous ride over the beautiful boat of the wild saura forest. Take an adventurous ride over the beautiful boat of the wild saura forest.",
    },
    {
      id: 1,
      eventImage:
        "https://images.pexels.com/photos/15328962/pexels-photo-15328962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      eventName: "Board Rafting",
      eventSummary:
        "Take an adventurous ride over the beautiful boat of the wild saura forest .",
    },
    {
      id: 2,
      eventImage:
        "https://images.pexels.com/photos/15328962/pexels-photo-15328962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      eventName: "Board Rafting",
      eventSummary:
        "Take an adventurous ride over the beautiful boat of the wild saura forest .",
    },
    {
      id: 3,
      eventImage:
        "https://images.pexels.com/photos/15328962/pexels-photo-15328962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      eventName: "Board Rafting",
      eventSummary:
        "Take an adventurous ride over the beautiful boat of the wild saura forest .",
    },
    {
      id: 4,
      eventImage:
        "https://images.pexels.com/photos/15328962/pexels-photo-15328962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      eventName: "Board Rafting",
      eventSummary:
        "Take an adventurous ride over the beautiful boat of the wild saura forest .",
    },
  ],
};
