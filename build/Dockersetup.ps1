#!/usr/bin/pwsh

#region Settings
    $imageNameBase = "plexmovieposterdisplay"
    # $tag = "latest"
    $tag = "2.0.d"
    $imageNameFull = "$($imageNameBase):$($tag)"

    $containerName = "plexmovieposterdisplayinstance"
#endregion

#region Remove Image
    docker image rm $($imageName)
#endregion

#region Build Image
    Write-Output "Build Image Name (Full): $($imageNameFull)"
    docker build -t $($imageNameFull) ../. 
#endregion

#region Stop and remove running container
    # docker stop $($containerName)
    # docker rm $($containerName)

    docker rm -f $($containerName)
#endregion

#region Run container
    docker run -d -p 80:80 --name $($containerName) $($imageNameFull)
    # docker run -it --name $($containerName) $($imageNameBase)
    # docker run -it -p 81:80 --name $($containerName) $($imageNameBase)

    # docker-compose up
#endregion