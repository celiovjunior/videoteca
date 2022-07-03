import React from "react";
import { Container, VideoListWrapper } from "./styles";
import AddVideo from "../AddVideo";

function VideoList() {
    return(
        <Container>
            <VideoListWrapper>
                <AddVideo />
            </VideoListWrapper>
        </Container>
    )
}

export default VideoList