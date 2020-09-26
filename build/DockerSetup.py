#!/usr/bin/env python3

class DockerMoviePoster:
    className = "DockerMoviePoster"
    className_string = "Docker Movie Poster"
    import os
    import subprocess

    def __init__(self,DisplayMSG=False):
        self.imageNameBase = "plexmovieposterdisplay_py"
        self.tag = "2.0.b"
       
        self.PortExternal = 81
        self.PortInternal = 80

        self.UpdateVariables()

        self.DisplayClassInfo(DisplayMSG=DisplayMSG)

    def DisplayClassInfo(self,DisplayMSG=False):
        self.UpdateVariables()

        if DisplayMSG == True:
            print ("\n{}".format(self.className_string))
            print ("\tDocker Image (NameBase): {}".format(self.imageNameBase))
            print ("\tDocker Image (tag): {}".format(self.tag))
            print ("\tDocker Image (imageNameFull): {}".format(self.imageNameFull))
            print ("\tDocker Image (container): {}".format(self.containerName))
            
            print ("\tPort (External): {}".format(self.PortExternal))
            print ("\tPort (Internal): {}".format(self.PortInternal))

    def UpdateVariables(self,DisplayMSG=False):
        self.imageNameFull = ("{}:{}".format(self.imageNameBase,self.tag))
        self.containerName = ("{}instance".format(self.imageNameBase))

    def ListImages(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nList Images (Full Name): {}\n".format(self.imageNameFull))
        cmd = "docker images {}".format(self.imageNameFull)
        # print ("{}".format(cmd))

        # ImageList = self.subprocess.check_output(cmd,shell = True)
        # print(ImageList)
        
        # self.subprocess.check_output(cmd,shell = True)
        self.subprocess.run(cmd,shell = True)

    def RemoveImage(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nRemove Image (Full Name): {}\n".format(self.imageNameFull))
        cmd = "docker image rm {}".format(self.imageNameFull)
        # print ("{}".format(cmd))

        self.subprocess.run(cmd,shell = True)

    def BuildImage(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nBuild Image (Full Name): {}\n".format(self.imageNameFull))
        cmd = ("docker build -t {} ../.".format(self.imageNameFull))
        # print ("{}".format(cmd))

        self.subprocess.run(cmd,shell = True)

    def StopContainer(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nStop Container: {}\n".format(self.containerName))
        cmd = ("docker stop {}".format(self.containerName))
        # print ("{}".format(cmd))

        self.subprocess.run(cmd,shell = True)
    
    def RemoveContainer(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nRemove Container: {}\n".format(self.containerName))
        cmd = ("docker rm {}".format(self.containerName))
        # print ("{}".format(cmd))

        self.subprocess.run(cmd,shell = True)
    
    def StopRemoveContainer(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nStop and Remove Container: {}\n".format(self.containerName))
        cmd = ("docker rm -f {}".format(self.containerName))
        # print ("{}".format(cmd))

        self.subprocess.run(cmd,shell = True)

    def RunContainer(self,DisplayMSG=False):
        self.UpdateVariables()

        print ("\nRun Container: ")
        print ("\tContainer Name: {}".format(self.containerName))
        print ("\tImage Name: {}".format(self.imageNameFull))
        print ("\tPorts: {}:{}\n".format(self.PortExternal,self.PortInternal))
        
        cmd = ("docker run -d -p {}:{} --name {} {}".format(self.PortExternal,self.PortInternal,self.containerName,self.imageNameFull))
        print ("{}".format(cmd))

        self.subprocess.run(cmd,shell = True)

    # def dockerCompose(self,DisplayMSG=False):
        # self.UpdateVariables()

        # print ("\nBuild Image (Full Name): {}\n".format(self.imageNameFull))
        # cmd = ("docker build -t {} ../.".format(self.imageNameFull))
        # # print ("{}".format(cmd))

        # self.subprocess.run(cmd,shell = True)


DisplayInfo = True

DockerSetup = DockerMoviePoster(DisplayMSG=DisplayInfo)

DockerSetup.tag = "2.1.a"
DockerSetup.DisplayClassInfo(DisplayMSG=DisplayInfo)

DockerSetup.ListImages()

DockerSetup.RemoveImage()
DockerSetup.BuildImage()
DockerSetup.StopRemoveContainer()
DockerSetup.RunContainer()
