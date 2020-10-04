#!/usr/bin/env python3
import sys, getopt


class DockerMoviePoster:
    className = "DockerMoviePoster"
    className_string = "Docker Movie Poster"
    import os
    import subprocess

    def __init__(self,DisplayMSG=False):
        self.Config_DisplayMSG = DisplayMSG

        self.imageNameBase = "plexmovieposterdisplay_py"
        self.tag = "2.2.0"

        self.PortExternal = 80
        self.PortInternal = 80

        self.UpdateVariables()
        self.DisplayClassInfo()

        self.Action_ListImages = False
        self.Action_RemoveImage = False
        self.Action_BuildImage = False
        self.Action_StopRemoveContainer = False
        self.Action_RunContainer = False

        self.DisplayClassActions(DisplayMSG=DisplayMSG)

    def DisplayClassInfo(self,DisplayMSG=False):
        self.UpdateVariables()

        if DisplayMSG == True or self.Config_DisplayMSG == True:
            print ("\n{} (Information):".format(self.className_string))
            print ("\tDocker Image (NameBase): {}".format(self.imageNameBase))
            print ("\tDocker Image (tag): {}".format(self.tag))
            print ("\tDocker Image (imageNameFull): {}".format(self.imageNameFull))
            print ("\tDocker Image (container): {}".format(self.containerName))

            print ("\tPort (External): {}".format(self.PortExternal))
            print ("\tPort (Internal): {}".format(self.PortInternal))

    def DisplayClassActions(self,DisplayMSG=False):
        if DisplayMSG == True or self.Config_DisplayMSG == True:
            print ("\n{} (Actions):".format(self.className_string))
            print ("\tList Images (Action_ListImages): {}".format(self.Action_ListImages))
            print ("\tRemove Image (Action_RemoveImage): {}".format(self.Action_RemoveImage))
            print ("\tBuild Image (Action_BuildImage): {}".format(self.Action_BuildImage))
            print ("\tStop Remove Container (Action_StopRemoveContainer): {}".format(self.Action_StopRemoveContainer))
            print ("\tRun Container (Action_RunContainer): {}".format(self.Action_RunContainer))

    def DisplayHelpInfo(self,DisplayMSG=False):
        #Notes: Help structure based off of 'docker --help' command
        # if DisplayMSG == True or self.Config_DisplayMSG == True:
            print ("\nUsage:  DockerSetup.py [OPTIONS] COMMAND\n")
            print ("A self-sufficient runtime for building images and running containers\n")
            print ("Options:")
            print ("      --config \t\t Displays the current configuration")
            print ("  -d, --display \t Sets the Display Message flag for the rest of the configuration")
            print ("  -b, --build \t\t Build docker image")
            print ("  -p, --port string \t Sets the External port the image will be exposed (default \"80\")")
            print ("      --portInt string \t Explicit Internal port (default \"80\")")
            print ("      --portExt string \t Explicit External port (default \"80\")")
            print ("  -t, --tag string \t Tag Image")
            print ("  -r, --run \t\t Start/Run docker container and built image")
            print ("  -i, --images \t\t List images that match current configuration")
            
            print ("\nManagement Commands:")
            print ("  image \tManage images")
            
            print ("\nCommands:")
            print ("  build \tBuild an image from a Dockerfile")
            print ("  images \tList images")
            print ("  port \t\tList port mappings or a specific mapping for the container")
            print ("  rm \t\tRemove one or more containers")
            print ("  run \t\tRun a command in a new container")
            print ("  stop \t\tStop one or more running containers")
            print ("  tag \t\tCreate a tag TARGET_IMAGE that refers to SOURCE_IMAGE")
            
            print ("\nRun 'DockerSetup COMMAND --help' for more information on a command.")

    def Actions(self,DisplayMSG=False):
        if self.Action_ListImages == True:
            if DisplayMSG == True or self.Config_DisplayMSG == True:
                print ("Listing Images...")

            self.ListImages()
        else:
            if DisplayMSG == True or self.Config_DisplayMSG == True:
                print ("No List Images Set")

        if self.Action_BuildImage == True:
            if DisplayMSG == True or self.Config_DisplayMSG == True:
                print ("Building Image...")

            self.RemoveImage()
            self.BuildImage()
        else:
            if DisplayMSG == True or self.Config_DisplayMSG == True:
                print ("No Build Action Set")

        if self.Action_RunContainer == True:
            if DisplayMSG == True or self.Config_DisplayMSG == True:
                print ("Running Image...")

            self.StopRemoveContainer()
            self.RunContainer()
        else:
            if DisplayMSG == True or self.Config_DisplayMSG == True:
                print ("No Run Action Set")

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

def main(argv):
   DockerSetup = DockerMoviePoster()

   try:
      opts, args = getopt.getopt(argv,"bdhrip:t:",["config","display","port=","portInt=","portExt=","tag=","build","run","images","help"])
   except getopt.GetoptError:
    #   print ("Incorrect Inputs detected \nDockerSetup.py --help")
      DockerSetup.DisplayHelpInfo()
      sys.exit(2)
   for opt, arg in opts:
    #   if opt == '-h' or opt == "--help":
      if opt in ("-h", "--help"):
         DockerSetup.DisplayHelpInfo()
         sys.exit()
      elif opt in ("-p", "--port"):
         DockerSetup.PortExternal = arg
      elif opt in ("--portInt"):
         DockerSetup.PortInternal = arg
      elif opt in ("--portExt"):
         DockerSetup.PortExternal = arg
      elif opt in ("-d", "--display"):
        DockerSetup.Config_DisplayMSG = True
      elif opt in ("-b", "--build"):
         DockerSetup.Action_BuildImage = True
      elif opt in ("-r", "--run"):
         DockerSetup.Action_RunContainer = True
      elif opt in ("-i", "--images"):
         DockerSetup.Action_ListImages = True
      elif opt in ("-t", "--tag"):
         DockerSetup.tag = arg
         DockerSetup.DisplayClassInfo()
      elif opt in ("-c","--config"):
          DockerSetup.DisplayClassInfo(DisplayMSG=True)
          DockerSetup.DisplayClassActions(DisplayMSG=True)
          sys.exit()

   DockerSetup.DisplayClassInfo()
   DockerSetup.DisplayClassActions()
   DockerSetup.Actions()

if __name__ == "__main__":
    main(sys.argv[1:])